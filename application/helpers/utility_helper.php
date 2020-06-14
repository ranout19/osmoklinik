<?php 

    function alreadyLogin()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('id_user');
        if ($userSession) {
            redirect('dashboard');
        }
    }
    function notLogin()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('id_user');
        if (!$userSession) {
            redirect('auth/login');
        }
    }
    function checkAdmin()
    {
        $ci =& get_instance();
        $ci->load->library('utility');
        if ($ci->utility->user_login()->level != 'admin') {
            redirect('dashboard');
        }
    }
    function checkReceipt()
    {
        $ci =& get_instance();
        $ci->load->library('utility');
        if ($ci->utility->user_login()->level != 'receipt' && $ci->utility->user_login()->level != 'admin') {
            redirect('dashboard');
        }
    }
    function checkApotek()
    {
        $ci =& get_instance();
        $ci->load->library('utility');
        if ($ci->utility->user_login()->level != 'apotek' && $ci->utility->user_login()->level != 'admin') {
            redirect('dashboard');
        }
    }
    function checkDokter()
    {
        $ci =& get_instance();
        $ci->load->library('utility');
        if ($ci->utility->user_login()->level != 'dokter') {
            redirect('dashboard');
        }
    }
    function idr($rp)
    {
        $result = "Rp ".number_format($rp);
        return $result;
    }
    function tanggal($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>