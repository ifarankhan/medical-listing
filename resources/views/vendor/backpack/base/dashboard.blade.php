@php use App\Models\User;use App\Models\UserRole; @endphp
@extends(backpack_view('blank'))

@php
    $target = 100; // Example target

    $customerRoleUserCount = User::getUserCountByRole(UserRole::ROLE_CUSTOMER);
    $widgets['after_content'][] = User::userCountByRoleWidgetArray($customerRoleUserCount, $target, [
        'description' => 'Registered Customers',
        'class' => 'card text-white bg-success mb-2',
    ]);

    $InsuranceProviderRoleUserCount = User::getUserCountByRole(UserRole::ROLE_INSURANCE_PROVIDER);
    $widgets['after_content'][] = User::userCountByRoleWidgetArray($InsuranceProviderRoleUserCount, $target, [
        'description' => 'Registered Insurance Providers',
        'class' => 'card text-white bg-primary mb-2',
    ]);
@endphp
