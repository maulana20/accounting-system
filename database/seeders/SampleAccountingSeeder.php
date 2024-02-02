<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Coa;
use App\FinancialTrans;
use App\GeneralCashBank;
use App\GlAnalysis;
use App\InterCashBank;
use App\Period;
use App\Posting;


class SampleAccountingSeeder extends Seeder
{    
    public function run()
    {
        // coa posting
        $this->insertPeriod();
        $this->insertCoa();
        $this->insertPosting();
        // financial trans
        $this->insertFinancialTrans();
        $this->insertGlAnalysis();
        $this->insertGeneralCashBank();
        $this->insertInterCashBank();
    }

    private function insertPeriod() : void
    {
        Period::insert([
            ['begin' => '201801', 'status' => 3],
            ['begin' => '201802', 'status' => 2],
            ['begin' => '201803', 'status' => 2],
            ['begin' => '201804', 'status' => 1],
            ['begin' => '201805', 'status' => 1],
            ['begin' => '201806', 'status' => 1],
            ['begin' => '201807', 'status' => 1],
            ['begin' => '201808', 'status' => 1],
            ['begin' => '201809', 'status' => 1],
            ['begin' => '201810', 'status' => 3],
            ['begin' => '201811', 'status' => 3],
            ['begin' => '201812', 'status' => 1]
        ]);
    }

    private function insertCoa() : void
    {
        Coa::insert([
            ['group_account_id' => 1, 'user_id' => 1, 'type' => 7, 'code' => '111101', 'name' => 'Kas IDR', 'lod' => 5, 'desc' => 'Kas IDR', 'vou' => 'KAS1'],
            ['group_account_id' => 2, 'user_id' => 1, 'type' => 7, 'code' => '111501', 'name' => 'MANDIRI - 121001', 'lod' => 5, 'desc' => 'MANDIRI - 121001', 'vou' => 'MAN1'],
            ['group_account_id' => 40, 'user_id' => 1, 'type' => 6, 'code' => '634200', 'name' => 'Perjalanan Dinas', 'lod' => 5, 'desc' => 'Perjalanan Dinas', 'vou' => NULL],
            ['group_account_id' => 40, 'user_id' => 1, 'type' => 5, 'code' => '634410', 'name' => 'Sarana Olah Raga Karyawan', 'lod' => 5, 'desc' => 'Sarana Olah Raga Karyawan', 'vou' => NULL],
            ['group_account_id' => 3, 'user_id' => 1, 'type' => 7, 'code' => '114502', 'name' => 'Piutang Deposit Sriwijaya', 'lod' => 5, 'desc' => 'Piutang Deposit Sriwijaya', 'vou' => NULL],
            ['group_account_id' => 3, 'user_id' => 1, 'type' => 7, 'code' => '114503', 'name' => 'Piutang Deposit Lion', 'lod' => 5, 'desc' => 'Piutang Deposit Lion', 'vou' => NULL],
            ['group_account_id' => 3, 'user_id' => 1, 'type' => 7, 'code' => '114504', 'name' => 'Piutang Deposit Citilink', 'lod' => 5, 'desc' => 'Piutang Deposit Citilink', 'vou' => NULL],
            ['group_account_id' => 40, 'user_id' => 1, 'type' => 5, 'code' => '634220', 'name' => 'Entertainment', 'lod' => 5, 'desc' => 'Entertainment', 'vou' => NULL],
            ['group_account_id' => 6, 'user_id' => 1, 'type' => 8, 'code' => '114601', 'name' => 'Percobaan Akun 1', 'lod' => 5, 'desc' => 'Percobaan Akun 1', 'vou' => NULL],
            ['group_account_id' => 23, 'user_id' => 1, 'type' => 1, 'code' => '174100', 'name' => 'Ayat Silang', 'lod' => 5, 'desc' => 'Ayat Silang', 'vou' => NULL],
            ['group_account_id' => 2, 'user_id' => 1, 'type' => 7, 'code' => '111511', 'name' => 'MAY BANK - 2427003336 IDR', 'lod' => 5, 'desc' => 'MAY BANK - 2427003336 IDR', 'vou' => 'MAY1'],
            ['group_account_id' => 2, 'user_id' => 1, 'type' => 7, 'code' => '111504', 'name' => 'MAY BANK - 2427001160 IDR', 'lod' => 5, 'desc' => 'MAY BANK - 2427001160 IDR', 'vou' => 'MAY2'],
            ['group_account_id' => 6, 'user_id' => 1, 'type' => 8, 'code' => '114602', 'name' => 'Percobaan Akun 2', 'lod' => 5, 'desc' => 'Percobaan Akun 2', 'vou' => NULL],
        ]);
    }

    private function insertPosting() : void
    {
        Posting::insert([
            ['coa_id' => 1, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 2, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 3, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 4, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 5, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 6, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 7, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 8, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 9, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 10, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 11, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 12, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 13, 'period_begin' => '201801', 'balance' => 0],
            ['coa_id' => 1, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 2, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 3, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 4, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 5, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 6, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 7, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 8, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 9, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 10, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 11, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 12, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 13, 'period_begin' => '201802', 'balance' => 0],
            ['coa_id' => 1, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 2, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 3, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 4, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 5, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 6, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 7, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 8, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 9, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 10, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 11, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 12, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 13, 'period_begin' => '201803', 'balance' => 0],
            ['coa_id' => 1, 'period_begin' => '201810', 'balance' => 100000],
            ['coa_id' => 2, 'period_begin' => '201810', 'balance' => -100000],
            ['coa_id' => 3, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 4, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 5, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 6, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 7, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 8, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 9, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 10, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 11, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 12, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 13, 'period_begin' => '201810', 'balance' => 0],
            ['coa_id' => 1, 'period_begin' => '201811', 'balance' => -118000],
            ['coa_id' => 2, 'period_begin' => '201811', 'balance' => -400000],
            ['coa_id' => 3, 'period_begin' => '201811', 'balance' => 10000],
            ['coa_id' => 4, 'period_begin' => '201811', 'balance' => 8000],
            ['coa_id' => 5, 'period_begin' => '201811', 'balance' => 300000],
            ['coa_id' => 6, 'period_begin' => '201811', 'balance' => 0],
            ['coa_id' => 7, 'period_begin' => '201811', 'balance' => 0],
            ['coa_id' => 8, 'period_begin' => '201811', 'balance' => 0],
            ['coa_id' => 9, 'period_begin' => '201811', 'balance' => 0],
            ['coa_id' => 10, 'period_begin' => '201811', 'balance' => 0],
            ['coa_id' => 11, 'period_begin' => '201811', 'balance' => 0],
            ['coa_id' => 12, 'period_begin' => '201811', 'balance' => 200000],
            ['coa_id' => 13, 'period_begin' => '201811', 'balance' => 0],
        ]);
    }

    private function insertFinancialTrans() : void
    {
        FinancialTrans::insert([
            ['user_id' => 1, 'period_begin' => '201810', 'type' => 3, 'vou' => 'KAS100000001', 'created_at' => '2018-10-30 05:56:04'],
            ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'KAS100000002', 'created_at' => '2018-11-01 03:00:00'],
            ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'MAN100000003', 'created_at' => '2018-11-01 04:00:00'],
            ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'MAN100000004', 'created_at' => '2018-11-14 20:12:42'],
            ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'KAS100000005', 'created_at' => '2018-11-15 03:57:49'],
            ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'MAY100000006', 'created_at' => '2018-11-15 03:57:49'],
        ]);
    }

    private function insertGlAnalysis() : void
    {
        GlAnalysis::insert([
            ['financial_trans_id' => 1, 'coa_to' => 1, 'coa_from' => 2, 'desc' => 'penambahan kas', 'position' => 2, 'value' => 100000, 'created_at' => '2018-10-30 05:56:04'],
            ['financial_trans_id' => 1, 'coa_to' => 2, 'coa_from' => 1, 'desc' => 'penambahan kas', 'position' => 1, 'value' => 100000, 'created_at' => '2018-10-30 05:56:04'],
            ['financial_trans_id' => 2, 'coa_to' => 1, 'coa_from' => 3, 'desc' => 'Perjalanan Maidah ke pulau Pari', 'position' => 1, 'value' => 10000, 'created_at' => '2018-11-01 03:00:00'],
            ['financial_trans_id' => 2, 'coa_to' => 1, 'coa_from' => 4, 'desc' => 'Sewa Lapangan OR bulu tangkis dan Fitness', 'position' => 1, 'value' => 8000, 'created_at' => '2018-11-01 03:00:00'],
            ['financial_trans_id' => 2, 'coa_to' => 3, 'coa_from' => 1, 'desc' => 'uang saku, OR', 'position' => 2, 'value' => 10000, 'created_at' => '2018-11-01 03:00:00'],
            ['financial_trans_id' => 2, 'coa_to' => 4, 'coa_from' => 1, 'desc' => 'uang saku, OR', 'position' => 2, 'value' => 8000, 'created_at' => '2018-11-01 03:00:00'],
            ['financial_trans_id' => 3, 'coa_to' => 5, 'coa_from' => 2, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079', 'position' => 2, 'value' => 200000, 'created_at' => '2018-11-01 04:00:00'],
            ['financial_trans_id' => 3, 'coa_to' => 2, 'coa_from' => 5, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079', 'position' => 1, 'value' => 200000, 'created_at' => '2018-11-01 04:00:00'],
            ['financial_trans_id' => 4, 'coa_to' => 5, 'coa_from' => 2, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079', 'position' => 2, 'value' => 100000, 'created_at' => '2018-11-14 20:12:42'],
            ['financial_trans_id' => 4, 'coa_to' => 2, 'coa_from' => 5, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079', 'position' => 1, 'value' => 100000, 'created_at' => '2018-11-14 20:12:42'],
            ['financial_trans_id' => 6, 'coa_to' => 10, 'coa_from' => 12, 'desc' => 'PB DARI KAS KE MAY BANK 160', 'position' => 1, 'value' => 200000, 'created_at' => '2018-11-15 03:57:49'],
            ['financial_trans_id' => 6, 'coa_to' => 12, 'coa_from' => 10, 'desc' => 'PB DARI KAS KE MAY BANK 160', 'position' => 2, 'value' => 200000, 'created_at' => '2018-11-15 03:57:49'],
            ['financial_trans_id' => 5, 'coa_to' => 1, 'coa_from' => 10, 'desc' => 'PB DARI KAS KE MAY BANK 160', 'position' => 1, 'value' => 200000, 'created_at' => '2018-11-15 03:57:49'],
            ['financial_trans_id' => 5, 'coa_to' => 10, 'coa_from' => 1, 'desc' => 'PB DARI KAS KE MAY BANK 160', 'position' => 2, 'value' => 200000, 'created_at' => '2018-11-15 03:57:49'],
        ]);
    }

    private function insertGeneralCashBank() : void
    {
        GeneralCashBank::insert([
            ['financial_trans_id' => 1, 'position' => 1, 'coa_to' => 1, 'desc' => 'penambahan kas'],
            ['financial_trans_id' => 2, 'position' => 2, 'coa_to' => 1, 'desc' => 'uang saku, OR'],
            ['financial_trans_id' => 3, 'position' => 2, 'coa_to' => 5, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079'],
            ['financial_trans_id' => 4, 'position' => 2, 'coa_to' => 5, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079'],
        ]);
    }

    private function insertInterCashBank() : void
    {
        InterCashBank::insert([
            ['financial_trans_out' => 5, 'financial_trans_in' => 6, 'coa_from' => 1, 'coa_to' => 12, 'value' => 200000, 'desc' => 'PB DARI KAS KE MAY BANK 160'],
        ]);
    }
}
