# Accounting System

Accounting System adalah mengolah data keuangan dan merekam kejadian transaksi untuk membuat laporan hasil proses akuntansi berupa : neraca saldo, jurnal umum, laporan laba rugi.

## Getting Started

Accounting System is monolith project using Laravel Framework (PHP) and Mysql for database. For frontend using blade and laravel mix for assets management.

## Development

### Installing

A step by step how to get a development env running

1.  `$ git clone https://github.com/maulana20/accounting-system.git`
2.  `$ composer install`
3.  Create **.env** file as per **.env.example**. #REQUIRED line must be change
4.  `$ php artisan key:generate`
5.  `$ php artisan migrate --seed`

### User Credential

User : admin
Pass : secret

### Package And Third Party

Backend package

1. Laravel Form Filed : https://github.com/nafiesl/FormField
2. Laravel DOM PDF : https://github.com/barryvdh/laravel-dompdf
