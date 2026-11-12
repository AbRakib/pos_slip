<?php

test('the dashboard renders its content within the application layout', function () {
    $response = $this->get(route('dashboard'));

    $response->assertOk()
        ->assertViewIs('dashboard')
        ->assertSee('Tea Shop POS - Dashboard')
        ->assertSee('Total Invoices')
        ->assertSee('Sales Overview')
        ->assertSee('Tea Category Sales')
        ->assertSee('Recent Invoices')
        ->assertSee('Quick Actions')
        ->assertSee('Sample data')
        ->assertSee('id="myAreaChart"', false)
        ->assertSee('id="myPieChart"', false)
        ->assertSee(asset('assets/css/sb-admin-2.min.css'), false)
        ->assertSee(asset('assets/js/dashboard.js'), false);
});
