<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\GroupAccount;

class GroupAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function getGroupAccount()
    {
        $groupaccount_list = [];
        $groupaccount_list[0] = ['name' => 'Kas', 'type' => 1, 'parent' => NULL]; // id => 1
        $groupaccount_list[1] = ['name' => 'Bank', 'type' => 1, 'parent' => NULL]; // id => 2
        $groupaccount_list[2] = ['name' => 'Piutang Usaha', 'type' => 1, 'parent' => NULL]; // id => 3
        $groupaccount_list[3] = ['name' => 'Piutang Yang Ditangguhkan', 'type' => 1, 'parent' => NULL]; // id => 4
        $groupaccount_list[4] = ['name' => 'Piutang Interco', 'type' => 1, 'parent' => NULL]; // id => 5
        $groupaccount_list[5] = ['name' => 'Piutang Refund', 'type' => 1, 'parent' => NULL]; // id => 6
        $groupaccount_list[6] = ['name' => 'Piutang Deposit', 'type' => 1, 'parent' => NULL]; // id => 7
        $groupaccount_list[7] = ['name' => 'Piutang Lain lain', 'type' => 1, 'parent' => NULL]; // id => 8
        $groupaccount_list[8] = ['name' => 'Uang Muka Pembelian', 'type' => 1, 'parent' => NULL]; // id => 9
        $groupaccount_list[9] = ['name' => 'Uang Muka Refund Penjualan', 'type' => 1, 'parent' => NULL]; // id => 10
        $groupaccount_list[10] = ['name' => 'Beban Yang Ditangguhkan', 'type' => 1, 'parent' => NULL]; // id => 11
        $groupaccount_list[11] = ['name' => 'Pembelian Yang Ditangguhkan', 'type' => 1, 'parent' => 11]; // id => 12
        $groupaccount_list[12] = ['name' => 'Discount Yang Ditangguhkan', 'type' => 1, 'parent' => 11]; // id => 13
        $groupaccount_list[13] = ['name' => 'Extra Discount Yang Ditangguhkan', 'type' => 1, 'parent' => 11]; // id => 14
        $groupaccount_list[14] = ['name' => 'Pajak Yang Dibayar Dimuka', 'type' => 1, 'parent' => NULL]; // id => 15
        $groupaccount_list[15] = ['name' => 'Biaya Yang Dibayar Dimuka', 'type' => 1, 'parent' => NULL]; // id => 16
        $groupaccount_list[16] = ['name' => 'Uang Jaminan', 'type' => 1, 'parent' => NULL]; // id => 17
        $groupaccount_list[17] = ['name' => 'Aktiva Tetap Berwujud', 'type' => 1, 'parent' => NULL]; // id => 18
        $groupaccount_list[18] = ['name' => 'Akumulasi Penyusutan', 'type' => 1, 'parent' => NULL]; // id => 19
        $groupaccount_list[19] = ['name' => 'Setelah Penyusutan', 'type' => 1, 'parent' => NULL]; // id => 20
        $groupaccount_list[20] = ['name' => 'Jaminan', 'type' => 1, 'parent' => NULL]; // id => 21
        $groupaccount_list[21] = ['name' => 'Lebih Bayar', 'type' => 1, 'parent' => NULL]; // id => 22
        $groupaccount_list[22] = ['name' => 'Ayat Silang', 'type' => 1, 'parent' => NULL]; // id => 23
        $groupaccount_list[23] = ['name' => 'Titipan', 'type' => 1, 'parent' => NULL]; // id => 24
        $groupaccount_list[24] = ['name' => 'Aktiva Lain lain', 'type' => 1, 'parent' => NULL]; // id => 25
        $groupaccount_list[25] = ['name' => 'Hutang Usaha', 'type' => 2, 'parent' => NULL]; // id => 26
        $groupaccount_list[26] = ['name' => 'Hutang Yang Ditangguhkan', 'type' => 2, 'parent' => NULL]; // id => 27
        $groupaccount_list[27] = ['name' => 'Hutang Extra Discount', 'type' => 2, 'parent' => NULL]; // id => 28
        $groupaccount_list[28] = ['name' => 'Hutang Extra Discount Yang Ditangguhkan', 'type' => 2, 'parent' => NULL]; // id => 29
        $groupaccount_list[29] = ['name' => 'Hutang Interco', 'type' => 2, 'parent' => NULL]; // id => 30
        $groupaccount_list[30] = ['name' => 'Hutang Refund', 'type' => 2, 'parent' => NULL]; // id => 31
        $groupaccount_list[31] = ['name' => 'Hutang Lain lain', 'type' => 2, 'parent' => NULL]; // id => 32
        $groupaccount_list[32] = ['name' => 'Uang Muka Penjualan', 'type' => 2, 'parent' => NULL]; // id => 33
        $groupaccount_list[33] = ['name' => 'Uang Muka Refund Pembelian', 'type' => 2, 'parent' => NULL]; // id => 34
        $groupaccount_list[34] = ['name' => 'Uang Muka Debet Note', 'type' => 2, 'parent' => NULL]; // id => 35
        $groupaccount_list[35] = ['name' => 'Pendapatan Yang Ditangguhkan ', 'type' => 2, 'parent' => NULL]; // id => 36
        $groupaccount_list[36] = ['name' => 'Penjualan Yang Ditangguhkan', 'type' => 2, 'parent' => 36]; // id => 37
        $groupaccount_list[37] = ['name' => 'Ongkos Kirim Yang Ditangguhkan', 'type' => 2, 'parent' => 36]; // id => 38
        $groupaccount_list[38] = ['name' => 'Hutang Pajak', 'type' => 2, 'parent' => NULL]; // id => 39
        $groupaccount_list[39] = ['name' => 'Biaya Yang Harus Dibayar', 'type' => 2, 'parent' => NULL]; // id => 40
        $groupaccount_list[40] = ['name' => 'Hutang Jangka Panjang', 'type' => 2, 'parent' => NULL]; // id => 41
        $groupaccount_list[41] = ['name' => 'Passiva Lain lain', 'type' => 2, 'parent' => NULL]; // id => 42
        $groupaccount_list[42] = ['name' => 'Modal', 'type' => 2, 'parent' => NULL]; // id => 43
        $groupaccount_list[43] = ['name' => 'Laba Rugi Tahun Lalu', 'type' => 2, 'parent' => NULL]; // id => 44
        $groupaccount_list[44] = ['name' => 'Laba Tahun Berjalan', 'type' => 2, 'parent' => NULL]; // id => 45
        
        return $groupaccount_list;
    }
    
    public function run()
    {
        $groupaccount_list = $this->getGroupAccount();
        
        foreach ($groupaccount_list as $data) {
            GroupAccount::create([
                'name'           => $data['name'],
                'type'           => $data['type'],
                'parent'         => $data['parent'],
            ]);
        }
    }
}
