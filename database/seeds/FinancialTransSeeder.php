<?php

use Illuminate\Database\Seeder;

use App\FinancialTrans;
use App\GlAnalysis;
use App\GeneralCashBank;
use App\InterCashBank;

class FinancialTransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function getFinancialTrans()
    {
        $financialtrans_list = [];
        $financialtrans_list[] = ['user_id' => 1, 'period_begin' => '201810', 'type' => 3, 'vou' => 'KAS100000001', 'created_at' => '2018-10-30 05:56:04'];
        $financialtrans_list[] = ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'KAS100000002', 'created_at' => '2018-11-01 03:00:00'];
        $financialtrans_list[] = ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'MAN100000003', 'created_at' => '2018-11-01 04:00:00'];
        $financialtrans_list[] = ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'MAN100000004', 'created_at' => '2018-11-14 20:12:42'];
        $financialtrans_list[] = ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'KAS100000005', 'created_at' => '2018-11-15 03:57:49'];
        $financialtrans_list[] = ['user_id' => 1, 'period_begin' => '201811', 'type' => 3, 'vou' => 'MAY100000006', 'created_at' => '2018-11-15 03:57:49'];
        
        return $financialtrans_list;
    }
    
    public function getGlAnalysis()
    {
        $glanalysis_list = [];
        $glanalysis_list[] = ['financial_trans_id' => 1, 'coa_to' => 1, 'coa_from' => 2, 'desc' => 'penambahan kas', 'position' => 2, 'value' => 100000];
        $glanalysis_list[] = ['financial_trans_id' => 1, 'coa_to' => 2, 'coa_from' => 1, 'desc' => 'penambahan kas', 'position' => 1, 'value' => 100000];
        $glanalysis_list[] = ['financial_trans_id' => 2, 'coa_to' => 1, 'coa_from' => 3, 'desc' => 'Perjalanan Maidah ke pulau Pari', 'position' => 1, 'value' => 10000];
        $glanalysis_list[] = ['financial_trans_id' => 2, 'coa_to' => 1, 'coa_from' => 4, 'desc' => 'Sewa Lapangan OR bulu tangkis dan Fitness', 'position' => 1, 'value' => 8000];
        $glanalysis_list[] = ['financial_trans_id' => 2, 'coa_to' => 3, 'coa_from' => 1, 'desc' => 'uang saku, OR', 'position' => 2, 'value' => 10000];
        $glanalysis_list[] = ['financial_trans_id' => 2, 'coa_to' => 4, 'coa_from' => 1, 'desc' => 'uang saku, OR', 'position' => 2, 'value' => 8000];
        $glanalysis_list[] = ['financial_trans_id' => 3, 'coa_to' => 5, 'coa_from' => 2, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079', 'position' => 2, 'value' => 200000];
        $glanalysis_list[] = ['financial_trans_id' => 3, 'coa_to' => 2, 'coa_from' => 5, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079', 'position' => 1, 'value' => 200000];
        $glanalysis_list[] = ['financial_trans_id' => 4, 'coa_to' => 5, 'coa_from' => 2, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079', 'position' => 2, 'value' => 100000];
        $glanalysis_list[] = ['financial_trans_id' => 4, 'coa_to' => 2, 'coa_from' => 5, 'desc' => 'DEPOSIT SRIWIJAYA DARI 079', 'position' => 1, 'value' => 100000];
        $glanalysis_list[] = ['financial_trans_id' => 6, 'coa_to' => 10, 'coa_from' => 12, 'desc' => 'PB DARI KAS KE MAY BANK 160', 'position' => 1, 'value' => 200000];
        $glanalysis_list[] = ['financial_trans_id' => 6, 'coa_to' => 12, 'coa_from' => 10, 'desc' => 'PB DARI KAS KE MAY BANK 160', 'position' => 2, 'value' => 200000];
        $glanalysis_list[] = ['financial_trans_id' => 5, 'coa_to' => 1, 'coa_from' => 10, 'desc' => 'PB DARI KAS KE MAY BANK 160', 'position' => 1, 'value' => 200000];
        $glanalysis_list[] = ['financial_trans_id' => 5, 'coa_to' => 10, 'coa_from' => 1, 'desc' => 'PB DARI KAS KE MAY BANK 160', 'position' => 2, 'value' => 200000];
        
        return $glanalysis_list;
    }
    
    public function getGeneralCashBank()
    {
        $generalcashbank_list = [];
        $generalcashbank_list[] = ['financial_trans_id' => 1, 'position' => 1];
        $generalcashbank_list[] = ['financial_trans_id' => 2, 'position' => 2];
        $generalcashbank_list[] = ['financial_trans_id' => 3, 'position' => 2];
        $generalcashbank_list[] = ['financial_trans_id' => 4, 'position' => 2];
        
        return $generalcashbank_list;
    }
    
    public function getInterCashBank()
    {
        $intercashbank_list = [];
        $intercashbank_list[] = ['financial_trans_out' => 5, 'financial_trans_in' => 6];
        
        return $intercashbank_list;
    }
    
    public function run()
    {
        $financialtrans_list = $this->getFinancialTrans();
        
        foreach ($financialtrans_list as $data) {
            FinancialTrans::create([
                'user_id'              => $data['user_id'],
                'period_begin'         => $data['period_begin'],
                'type'                 => $data['type'],
                'vou'                  => $data['vou'],
                'created_at'           => $data['created_at'],
            ]);
        }
        
        $glanalysis_list = $this->getGlAnalysis();
        
        foreach ($glanalysis_list as $data) {
            GlAnalysis::create([
                'financial_trans_id'  => $data['financial_trans_id'],
                'coa_to'              => $data['coa_to'],
                'coa_from'            => $data['coa_from'],
                'desc'                => $data['desc'],
                'position'            => $data['position'],
                'value'               => $data['value'],
            ]);
        }
        
        $generalcashbank_list = $this->getGeneralCashBank();
        
        foreach ($generalcashbank_list as $data) {
            GeneralCashBank::create([
                'financial_trans_id'  => $data['financial_trans_id'],
                'position'  => $data['position'],
            ]);
        }
        
        $intercashbank_list = $this->getInterCashBank();
        
        foreach ($intercashbank_list as $data) {
            InterCashBank::create([
                'financial_trans_out'  => $data['financial_trans_out'],
                'financial_trans_in'  => $data['financial_trans_in'],
            ]);
        }
    }
}
