<?php
/** Shared view and request helpers. */
function e($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function flash(string $type, string $text): void { $_SESSION['flash'] = ['type' => $type, 'text' => $text]; }
function consume_flash(): ?array { $f = $_SESSION['flash'] ?? null; unset($_SESSION['flash']); return $f; }
function avatar_url(?string $path, string $name): string {
    if ($path && is_file(__DIR__ . '/' . $path)) return e($path);
    return 'https://ui-avatars.com/api/?background=4f46e5&color=fff&bold=true&name=' . rawurlencode($name);
}
function room_image(array $room): string {
    $type = strtolower($room['room_type'] ?? '');
    if (str_contains($type, 'single')) return 'images/single_occupancy_(premium_ac)_1.jpg';
    if (str_contains($type, '3-bed')) return 'images/triple_sharing_(standard_ac)_1.jpg';
    if (str_contains($type, '4-bed')) return 'images/four_deluxe_sharing_(ultra_ac)_1.jpg';
    if (str_contains($type, '2-bed')) return 'images/double_sharing_(standard_ac)_1.jpg';
    return 'images/hostel.jpg';
}
function status_class(string $status): string { return strtolower($status); }
?>
