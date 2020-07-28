<?php

use Illuminate\Database\Seeder;

use App\Period;
use App\Coa;
use App\Posting;

class CoaPostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function getPeriod()
    {
        $period_list = [];
        $period_list[] = ['begin' => '201801', 'status' => 3];
        $period_list[] = ['begin' => '201802', 'status' => 2];
        $period_list[] = ['begin' => '201803', 'status' => 2];
        $period_list[] = ['begin' => '201804', 'status' => 1];
        $period_list[] = ['begin' => '201805', 'status' => 1];
        $period_list[] = ['begin' => '201806', 'status' => 1];
        $period_list[] = ['begin' => '201807', 'status' => 1];
        $period_list[] = ['begin' => '201808', 'status' => 1];
        $period_list[] = ['begin' => '201809', 'status' => 1];
        $period_list[] = ['begin' => '201810', 'status' => 3];
        $period_list[] = ['begin' => '201811', 'status' => 3];
        $period_list[] = ['begin' => '201812', 'status' => 1];
        
        return $period_list;
    }
    
    public function getCoa()
    {
        $coa_list = [];
        $coa_list[] = ['group_account_id' => 1, 'user_id' => 1, 'type' => 7, 'code' => '111101', 'name' => 'Kas IDR', 'lod' => 5, 'desc' => 'Kas IDR', 'vou' => 'KAS1'];
        $coa_list[] = ['group_account_id' => 2, 'user_id' => 1, 'type' => 7, 'code' => '111501', 'name' => 'MANDIRI - 121001', 'lod' => 5, 'desc' => 'MANDIRI - 121001', 'vou' => 'MAN1'];
        $coa_list[] = ['group_account_id' => 40, 'user_id' => 1, 'type' => 6, 'code' => '634200', 'name' => 'Perjalanan Dinas', 'lod' => 5, 'desc' => 'Perjalanan Dinas', 'vou' => NULL];
        $coa_list[] = ['group_account_id' => 40, 'user_id' => 1, 'type' => 5, 'code' => '634410', 'name' => 'Sarana Olah Raga Karyawan', 'lod' => 5, 'desc' => 'Sarana Olah Raga Karyawan', 'vou' => NULL];
        $coa_list[] = ['group_account_id' => 3, 'user_id' => 1, 'type' => 7, 'code' => '114502', 'name' => 'Piutang Deposit Sriwijaya', 'lod' => 5, 'desc' => 'Piutang Deposit Sriwijaya', 'vou' => NULL];
        $coa_list[] = ['group_account_id' => 3, 'user_id' => 1, 'type' => 7, 'code' => '114503', 'name' => 'Piutang Deposit Lion', 'lod' => 5, 'desc' => 'Piutang Deposit Lion', 'vou' => NULL];
        $coa_list[] = ['group_account_id' => 3, 'user_id' => 1, 'type' => 7, 'code' => '114504', 'name' => 'Piutang Deposit Citilink', 'lod' => 5, 'desc' => 'Piutang Deposit Citilink', 'vou' => NULL];
        $coa_list[] = ['group_account_id' => 40, 'user_id' => 1, 'type' => 5, 'code' => '634220', 'name' => 'Entertainment', 'lod' => 5, 'desc' => 'Entertainment', 'vou' => NULL];
        $coa_list[] = ['group_account_id' => 6, 'user_id' => 1, 'type' => 8, 'code' => '114601', 'name' => 'Percobaan Akun 1', 'lod' => 5, 'desc' => 'Percobaan Akun 1', 'vou' => NULL];
        $coa_list[] = ['group_account_id' => 23, 'user_id' => 1, 'type' => 1, 'code' => '174100', 'name' => 'Ayat Silang', 'lod' => 5, 'desc' => 'Ayat Silang', 'vou' => NULL];
        $coa_list[] = ['group_account_id' => 2, 'user_id' => 1, 'type' => 7, 'code' => '111511', 'name' => 'MAY BANK - 2427003336 IDR', 'lod' => 5, 'desc' => 'MAY BANK - 2427003336 IDR', 'vou' => 'MAY1'];
        $coa_list[] = ['group_account_id' => 2, 'user_id' => 1, 'type' => 7, 'code' => '111504', 'name' => 'MAY BANK - 2427001160 IDR', 'lod' => 5, 'desc' => 'MAY BANK - 2427001160 IDR', 'vou' => 'MAY2'];
        $coa_list[] = ['group_account_id' => 6, 'user_id' => 1, 'type' => 8, 'code' => '114602', 'name' => 'Percobaan Akun 2', 'lod' => 5, 'desc' => 'Percobaan Akun 2', 'vou' => NULL];
        
        return $coa_list;
    }
    
    public function getPosting()
    {
        $posting_list = [];
        $posting_list[] = ['coa_id' => 1, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 2, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 3, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 4, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 5, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 6, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 7, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 8, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 9, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 10, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 11, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 12, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 13, 'period_begin' => '201801', 'balance' => 0];
        $posting_list[] = ['coa_id' => 1, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 2, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 3, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 4, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 5, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 6, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 7, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 8, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 9, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 10, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 11, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 12, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 13, 'period_begin' => '201802', 'balance' => 0];
        $posting_list[] = ['coa_id' => 1, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 2, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 3, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 4, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 5, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 6, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 7, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 8, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 9, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 10, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 11, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 12, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 13, 'period_begin' => '201803', 'balance' => 0];
        $posting_list[] = ['coa_id' => 1, 'period_begin' => '201810', 'balance' => 100000];
        $posting_list[] = ['coa_id' => 2, 'period_begin' => '201810', 'balance' => -100000];
        $posting_list[] = ['coa_id' => 3, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 4, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 5, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 6, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 7, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 8, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 9, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 10, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 11, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 12, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 13, 'period_begin' => '201810', 'balance' => 0];
        $posting_list[] = ['coa_id' => 1, 'period_begin' => '201811', 'balance' => -118000];
        $posting_list[] = ['coa_id' => 2, 'period_begin' => '201811', 'balance' => -400000];
        $posting_list[] = ['coa_id' => 3, 'period_begin' => '201811', 'balance' => 10000];
        $posting_list[] = ['coa_id' => 4, 'period_begin' => '201811', 'balance' => 8000];
        $posting_list[] = ['coa_id' => 5, 'period_begin' => '201811', 'balance' => 300000];
        $posting_list[] = ['coa_id' => 6, 'period_begin' => '201811', 'balance' => 0];
        $posting_list[] = ['coa_id' => 7, 'period_begin' => '201811', 'balance' => 0];
        $posting_list[] = ['coa_id' => 8, 'period_begin' => '201811', 'balance' => 0];
        $posting_list[] = ['coa_id' => 9, 'period_begin' => '201811', 'balance' => 0];
        $posting_list[] = ['coa_id' => 10, 'period_begin' => '201811', 'balance' => 0];
        $posting_list[] = ['coa_id' => 11, 'period_begin' => '201811', 'balance' => 0];
        $posting_list[] = ['coa_id' => 12, 'period_begin' => '201811', 'balance' => 200000];
        $posting_list[] = ['coa_id' => 13, 'period_begin' => '201811', 'balance' => 0];
        
        return $posting_list;
    }
    
    public function run()
    {
        $period_list = $this->getPeriod();
        
        foreach ($period_list as $data) {
            Period::create([
                'begin'            => $data['begin'],
                'status'           => $data['status'],
            ]);
        }
        
        $coa_list = $this->getCoa();
        
        foreach ($coa_list as $data) {
            Coa::create([
                'group_account_id' => $data['group_account_id'],
                'user_id'          => $data['user_id'],
                'type'             => $data['type'],
                'code'             => $data['code'],
                'name'             => $data['name'],
                'lod'              => $data['lod'],
                'desc'             => $data['desc'],
                'vou'              => $data['vou'],
            ]);
        }
        
        $posting_list = $this->getPosting();
        
        foreach ($posting_list as $data) {
            Posting::create([
                'coa_id'           => $data['coa_id'],
                'period_begin'     => $data['period_begin'],
                'balance'          => $data['balance'],
            ]);
        }
    }
}
