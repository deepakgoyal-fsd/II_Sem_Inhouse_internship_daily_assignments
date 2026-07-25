<?php
include('db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$req_id = isset($_GET['id']) ? intval($_GET['id']) : 0;


$sql = "SELECT req.*, 
               u.name, u.email, u.phone_number, u.fathers_name, u.mothers_name, u.branch, u.permanent_address, 
               r.room_number, r.room_type, r.fees_per_sem 
        FROM room_requests req 
        JOIN users u ON req.user_id = u.id 
        JOIN rooms r ON req.room_id = r.id 
        WHERE req.id = ? AND req.status = 'Approved' AND req.payment_status = 'Paid'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $req_id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data || ($_SESSION['user_role'] !== 'admin' && $data['user_id'] != $_SESSION['user_id'])) {
    die("Unauthorized Access or Receipt Not Found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Official Fee Receipt - KBH</title>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #1e293b; background: #fff; margin: 0; padding: 20px; }
        .receipt-box { max-width: 800px; margin: auto; border: 2px solid #0f172a; padding: 40px; border-radius: 12px; position: relative; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        
       
        .header-container { display: flex; align-items: center; border-bottom: 3px double #0f172a; padding-bottom: 20px; margin-bottom: 25px; }
        .logo-area { display: flex; gap: 15px; width: 30%; align-items: center; }
        .logo-area img.skit-logo { height: 75px; object-fit: contain; }
        .logo-area img.swami-img { height: 85px; object-fit: contain; border-radius: 4px; }
        .title-area { width: 70%; text-align: right; }
        .title-area h1 { margin: 0; font-size: 1.6rem; color: #1e1b4b; font-weight: 800; }
        .title-area p { margin: 4px 0 0 0; font-size: 0.85rem; color: #475569; font-weight: 600; }
        
        .receipt-title { text-align: center; font-weight: 800; font-size: 1.2rem; letter-spacing: 2px; margin: 20px 0; color: #1e1b4b; text-decoration: underline; }
        
     
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 25px; }
        .details-table td { padding: 10px 12px; font-size: 0.95rem; border-bottom: 1px solid #e2e8f0; }
        .details-table td.label { font-weight: 700; color: #475569; width: 30%; background: #f8fafc; }
        .details-table td.value { color: #0f172a; font-weight: 500; }
        
        .amount-box { background: #f1f5f9; padding: 18px; border-radius: 8px; text-align: right; font-size: 1.3rem; font-weight: 800; border: 1px solid #cbd5e1; margin-bottom: 40px; color: #1e1b4b; }
        
      
        .signature-container { display: flex; justify-content: space-between; margin-top: 50px; padding: 0 10px; }
        .sig-block { width: 45%; display: flex; flex-direction: column; }
        .sig-block.left { align-items: flex-start; text-align: left; }
        .sig-block.right { align-items: flex-end; text-align: right; }
        
        .student-name-display { margin: 0 0 10px 0; font-size: 1.1rem; font-weight: 700; color: #1e293b; font-family: 'Courier New', Courier, monospace; font-style: italic; min-height: 50px; display: flex; align-items: flex-end; }
        .sig-image { height: 50px; max-width: 180px; object-fit: contain; margin-bottom: 10px; display: block; }
        .sig-line { width: 100%; border-top: 1px solid #0f172a; padding-top: 8px; font-size: 0.9rem; font-weight: 700; color: #334155; }

        .print-btn-area { text-align: center; margin-bottom: 20px; }
        .btn-print { background: #10B981; color: #06281F; border: none; padding: 12px 24px; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 1rem; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.22); }
        
        @media print {
            .print-btn-area { display: none; }
            body { padding: 0; }
            .receipt-box { border: none; box-shadow: none; padding: 10px; }
           
            img { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
    </style>
</head>
<body>

    <div class="print-btn-area">
        <button class="btn-print" onclick="window.print()">🖨️ Print Receipt / Save as PDF</button>
    </div>

    <div class="receipt-box">
        
      
        <div class="header-container">
            <div class="logo-area">
                <img src="images/skit_logo.png" class="skit-logo" alt="SKIT Logo" onerror="this.src='https://placehold.co/100x100?text=SKIT'">
                <img src="images/swami_image.png" class="swami-img" alt="Swami Image" onerror="this.src='https://placehold.co/100x100?text=Swami+Ji'">
            </div>
            <div class="title-area">
                <h1>SWAMI KESHVANAND INSTITUTE OF TECHNOLOGY, MANAGEMENT & GRAMOTHAN</h1>
                <p>Ramnagaria, Jagatpura, Jaipur, Rajasthan 302017</p>
                <p style="color: #059669; font-size: 0.9rem; margin-top: 5px;">KESHVANAND BOYS HOSTEL (KBH)</p>
            </div>
        </div>

        <div class="receipt-title">E-FEE RECEIPT (ACADEMIC SESSION 2026-27)</div>

  
        <table class="details-table">
            <tr>
                <td class="label">Receipt No / Transaction ID</td>
                <td class="value" style="font-weight:700; color:#059669;">KBH-<?=date('Y', strtotime($data['created_at']))?>-<?=str_pad($data['id'], 5, '0', STR_PAD_LEFT)?></td>
                <td class="label">Date & Time</td>
                <td class="value"><?php echo date('d-M-Y h:i A'); ?></td>
            </tr>
            <tr>
                <td class="label">Student Name</td>
                <td class="value" style="text-transform: uppercase; font-weight:700;"><?php echo htmlspecialchars($data['name']); ?></td>
                <td class="label">Roll Number</td>
                <td class="value" style="font-weight:700;"><?php echo htmlspecialchars($data['roll_no']); ?></td>
            </tr>
            <tr>
                <td class="label">Father's Name</td>
                <td class="value"><?php echo htmlspecialchars($data['fathers_name'] ?? 'Not Updated'); ?></td>
                <td class="label">Branch / Stream</td>
                <td class="value"><?php echo htmlspecialchars($data['branch'] ?? 'Not Updated'); ?></td>
            </tr>
            <tr>
                <td class="label">Registered Email</td>
                <td class="value"><?php echo htmlspecialchars($data['email']); ?></td>
                <td class="label">Mobile Number</td>
                <td class="value"><?php echo htmlspecialchars($data['phone_number'] ?? 'Not Updated'); ?></td>
            </tr>
            <tr>
                <td class="label">Allocated Room No</td>
                <td class="value" style="font-weight:700;">Room <?php echo htmlspecialchars($data['room_number']); ?></td>
                <td class="label">Room Category</td>
                <td class="value"><?php echo htmlspecialchars($data['room_type']); ?></td>
            </tr>
            <tr>
                <td class="label">Stay Plan Duration</td>
                <td class="value"><?php echo htmlspecialchars($data['stay_duration']); ?> Plan</td>
                <td class="label">Payment Status</td>
                <td class="value" style="color: #10b981; font-weight: 800;">SUCCESSFUL (PAID)</td>
            </tr>
            <tr>
                <td class="label">Permanent Address</td>
                <td class="value" colspan="3"><?php echo htmlspecialchars($data['permanent_address'] ?? 'Not Updated'); ?></td>
            </tr>
        </table>

        
        <div class="amount-box">
            Total Hostel Fees Paid: ₹<?php echo number_format($data['final_amount']); ?>/-
        </div>

     
        <div style="display:flex;align-items:center;gap:14px;padding:12px;background:#f8fafc;border-radius:10px;margin-bottom:20px;color:#475569;font-size:.8rem;"><div id="qrCode" style="width:70px;height:70px;background:white;padding:4px;"></div><div><strong>Digital verification</strong><br>Scan to verify receipt reference KBH-<?=date('Y', strtotime($data['created_at']))?>-<?=str_pad($data['id'], 5, '0', STR_PAD_LEFT)?>.</div></div>
        <div class="signature-container">
          
            <div class="sig-block left">
                <div class="student-name-display"><?php echo htmlspecialchars($data['name']); ?></div>
                <div class="sig-line">Student Name & Signature</div>
            </div>
            
            
            <div class="sig-block right">
                <img src="images/incharge_sig_2.png" class="sig-image" alt="Incharge Signature" onerror="this.src='https://placehold.co/150x50?text=AUTHORIZED+SIGNATURE'">
                <div class="sig-line">Hostel Incharge Signature</div>
            </div>
        </div>

        <div class="footer" style="text-align: center; margin-top: 50px; font-size: 0.8rem; color: #64748b;">
            <p>This is an official computer-generated electronic fee receipt registered under KBH Portal System.</p>
            <p>© <?php echo date('Y'); ?> SKIT KBH. All Rights Reserved.</p>
        </div>
    </div>

<script>new QRCode(document.getElementById('qrCode'), {text: <?=json_encode('KBH receipt #'.$data['id'].' | '.$data['name'].' | Room '.$data['room_number'].' | Rs '.$data['final_amount'])?>, width:62, height:62});</script>
</body>
</html>
