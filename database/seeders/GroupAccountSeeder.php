<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\GroupAccount;

class GroupAccountSeeder extends Seeder
{
    public function run()
    {
        $this->insertGroupAccount();
    }

    private function insertGroupAccount() : void
    {
        GroupAccount::insert([
            ['name' => 'Kas', 'type' => 1, 'parent' => NULL], // 1
            ['name' => 'Bank', 'type' => 1, 'parent' => NULL], // 2
            ['name' => 'Piutang Usaha', 'type' => 1, 'parent' => NULL], // 3
            ['name' => 'Piutang Yang Ditangguhkan', 'type' => 1, 'parent' => NULL], // 4
            ['name' => 'Piutang Interco', 'type' => 1, 'parent' => NULL], // 5
            ['name' => 'Piutang Refund', 'type' => 1, 'parent' => NULL], // 6
            ['name' => 'Piutang Deposit', 'type' => 1, 'parent' => NULL], // 7
            ['name' => 'Piutang Lain lain', 'type' => 1, 'parent' => NULL], // 8
            ['name' => 'Uang Muka Pembelian', 'type' => 1, 'parent' => NULL], // 9
            ['name' => 'Uang Muka Refund Penjualan', 'type' => 1, 'parent' => NULL], // 10
            ['name' => 'Beban Yang Ditangguhkan', 'type' => 1, 'parent' => NULL], // 11
            ['name' => 'Pembelian Yang Ditangguhkan', 'type' => 1, 'parent' => 11], // 12
            ['name' => 'Discount Yang Ditangguhkan', 'type' => 1, 'parent' => 11], // 13
            ['name' => 'Extra Discount Yang Ditangguhkan', 'type' => 1, 'parent' => 11], // 14
            ['name' => 'Pajak Yang Dibayar Dimuka', 'type' => 1, 'parent' => NULL], // 15
            ['name' => 'Biaya Yang Dibayar Dimuka', 'type' => 1, 'parent' => NULL], // 16
            ['name' => 'Uang Jaminan', 'type' => 1, 'parent' => NULL], // 17
            ['name' => 'Aktiva Tetap Berwujud', 'type' => 1, 'parent' => NULL], // 18
            ['name' => 'Akumulasi Penyusutan', 'type' => 1, 'parent' => NULL], // 19
            ['name' => 'Setelah Penyusutan', 'type' => 1, 'parent' => NULL], // 20
            ['name' => 'Jaminan', 'type' => 1, 'parent' => NULL], // 21
            ['name' => 'Lebih Bayar', 'type' => 1, 'parent' => NULL], // 22
            ['name' => 'Ayat Silang', 'type' => 1, 'parent' => NULL], // 23
            ['name' => 'Titipan', 'type' => 1, 'parent' => NULL], // 24
            ['name' => 'Aktiva Lain lain', 'type' => 1, 'parent' => NULL], // 25
            ['name' => 'Hutang Usaha', 'type' => 2, 'parent' => NULL], // 26
            ['name' => 'Hutang Yang Ditangguhkan', 'type' => 2, 'parent' => NULL], // 27
            ['name' => 'Hutang Extra Discount', 'type' => 2, 'parent' => NULL], // 28
            ['name' => 'Hutang Extra Discount Yang Ditangguhkan', 'type' => 2, 'parent' => NULL], // 29
            ['name' => 'Hutang Interco', 'type' => 2, 'parent' => NULL], // 30
            ['name' => 'Hutang Refund', 'type' => 2, 'parent' => NULL], // 31
            ['name' => 'Hutang Lain lain', 'type' => 2, 'parent' => NULL], // 32
            ['name' => 'Uang Muka Penjualan', 'type' => 2, 'parent' => NULL], // 33
            ['name' => 'Uang Muka Refund Pembelian', 'type' => 2, 'parent' => NULL], // 34
            ['name' => 'Uang Muka Debet Note', 'type' => 2, 'parent' => NULL], // 35
            ['name' => 'Pendapatan Yang Ditangguhkan ', 'type' => 2, 'parent' => NULL], // 36
            ['name' => 'Penjualan Yang Ditangguhkan', 'type' => 2, 'parent' => 36], // 37
            ['name' => 'Ongkos Kirim Yang Ditangguhkan', 'type' => 2, 'parent' => 36], // 38
            ['name' => 'Hutang Pajak', 'type' => 2, 'parent' => NULL], // 39
            ['name' => 'Biaya Yang Harus Dibayar', 'type' => 2, 'parent' => NULL], // 40
            ['name' => 'Hutang Jangka Panjang', 'type' => 2, 'parent' => NULL], // 41
            ['name' => 'Passiva Lain lain', 'type' => 2, 'parent' => NULL], // 42
            ['name' => 'Modal', 'type' => 2, 'parent' => NULL], // 43
            ['name' => 'Laba Rugi Tahun Lalu', 'type' => 2, 'parent' => NULL], // 44
            ['name' => 'Laba Tahun Berjalan', 'type' => 2, 'parent' => NULL], // 45
        ]);
    }
}
