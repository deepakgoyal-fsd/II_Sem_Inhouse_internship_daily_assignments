<?php
include('db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$req_id = isset($_GET['id']) ? intval($_GET['id']) : 0;


$sql = "SELECT req.*, u.name, u.email, r.room_number, r.room_type, r.fees_per_sem 
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
    <title>Fee Receipt - KBH</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; background: #fff; margin: 0; padding: 20px; }
        .receipt-box { max-width: 700px; margin: auto; border: 2px solid #333; padding: 30px; border-radius: 8px; position: relative; }
        .header { text-align: center; border-bottom: 2px dashed #333; padding-bottom: 15px; margin-bottom: 20px; }
        .header h1 { margin: 0; font-size: 1.8rem; color: #1e1b4b; }
        .header p { margin: 5px 0 0 0; font-size: 0.9rem; color: #555; }
        .details-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .details-table td { padding: 10px; font-size: 1rem; border-bottom: 1px solid #eee; }
        .details-table td.label { font-weight: bold; color: #555; width: 35%; }
        .amount-box { background: #f4f4f5; padding: 15px; border-radius: 6px; text-align: right; font-size: 1.2rem; font-weight: bold; border: 1px solid #ccc; }
        .footer { text-align: center; margin-top: 40px; font-size: 0.85rem; color: #777; border-top: 1px solid #ddd; padding-top: 10px; }
        .print-btn-area { text-align: center; margin-bottom: 20px; }
        .btn-print { background: #10B981; color: #06281F; border: none; padding: 10px 20px; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 1rem; }
        
       
        @media print {
            .print-btn-area { display: none; }
            body { padding: 0; }
            .receipt-box { border: none; }
        }
    </style>
</head>
<body>

    <div class="print-btn-area">
        <button class="btn-print" onclick="window.print()">🖨️ Print Receipt / Save as PDF</button>
    </div>

    <div class="receipt-box">
        <div class="header">
            <h1>KESHVANAND BOYS HOSTEL (KBH)</h1>
            <p>Swami Keshvanand Institute of Technology, Management & Gramothan (SKIT), Jaipur</p>
            <p style="font-weight: bold; margin-top: 10px; font-size: 1.1rem; letter-spacing: 1px;">E-FEE RECEIPT</p>
        </div>

        <table class="details-table">
            <tr>
                <td class="label">Receipt No / TXN ID:</td>
                <td>KBH-TXN-<?php echo $data['id'] . rand(1000, 9999); ?></td>
            </tr>
            <tr>
                <td class="label">Payment Date:</td>
                <td><?php echo date('d-M-Y H:i A'); ?></td>
            </tr>
            <tr>
                <td class="label">Student Name:</td>
                <td><?php echo htmlspecialchars($data['name']); ?></td>
            </tr>
            <tr>
                <td class="label">Roll Number:</td>
                <td><?php echo htmlspecialchars($data['roll_no']); ?></td>
            </tr>
            <tr>
                <td class="label">Registered Email:</td>
                <td><?php echo htmlspecialchars($data['email']); ?></td>
            </tr>
            <tr>
                <td class="label">Allocated Room No:</td>
                <td><?php echo htmlspecialchars($data['room_number']); ?></td>
            </tr>
            <tr>
                <td class="label">Room Specifications:</td>
                <td><?php echo htmlspecialchars($data['room_type']); ?></td>
            </tr>
            <tr>
                <td class="label">Payment Status:</td>
                <td style="color: green; font-weight: bold;">SUCCESSFUL (PAID)</td>
            </tr>
        </table>

        <div class="amount-box">
            Total Fees Paid (per sem): ₹<?php echo number_format($data['fees_per_sem']); ?>/-
        </div>

        <div class="footer">
            <p>This is a computer-generated electronic fee receipt, no physical signature required.</p>
            <p>© <?php echo date('Y'); ?> KBH Portal. All Rights Reserved.</p>
        </div>
    </div>

</body>
</html>
