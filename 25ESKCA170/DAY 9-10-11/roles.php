<?php
const ROLE_ADMIN = 'Admin';
const ROLE_HEAD_ADMIN = 'headAdmin';
const ROLE_USER = 'user';

function normalizeRole($role): string {
    $role = trim((string) ($role ?? ''));
    if ($role === '') {
        return ROLE_USER;
    }

    $map = [
        'admin' => ROLE_ADMIN,
        'headadmin' => ROLE_HEAD_ADMIN,
        'head_admin' => ROLE_HEAD_ADMIN,
        'head-admin' => ROLE_HEAD_ADMIN,
        'user' => ROLE_USER,
    ];

    $normalized = strtolower($role);
    return $map[$normalized] ?? $role;
}

function isHeadAdmin($role): bool {
    return normalizeRole($role) === ROLE_HEAD_ADMIN;
}

function isAdmin($role): bool {
    $normalized = normalizeRole($role);
    return $normalized === ROLE_ADMIN || $normalized === ROLE_HEAD_ADMIN;
}
?>
