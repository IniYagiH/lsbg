<?php
$CI =& get_instance();

$CI->load->library('List_class');
$CI->load->helper('Ssl');
class DataTableApi
{
    public $columnsDefault = [
        'asesor1'=>true,
        'asesor2'=>true,
        'base_url'=> true,
        'id1'=> true,
        'id2'=> true,
        'id3'=> true,
        'id4'=> true,
        'no_urut'=> true,
        'qr'=>true,
        'kbli'=>true,
        'biaya_lsbu'=>true,
        'file_perjanjian'=>true,
        'file_pembayaran'=>true,
        'status_0'=>true,
        'concat_sub'=>true,
        'concat_klasifikasi'=>true,
        'concat_kualifikasi'=>true,
        'nama'=>true,
        'NIB'=>true,
        'tgl_permohonan'=>true,
        'propinsi'=>true,
        'tahun'=>true,
        'status_1'=>true,
        'status_2'=>true,
        'status_3'=>true,
        'stat'=>true,

    ];

    public function __construct()
    {

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: *');
    }

    public function init()
    {
        if (isset($_GET['columnsDef']) && is_array($_GET['columnsDef'])) {
            foreach ($_GET['columnsDef'] as $field) {
                $columnsDefault[$field] = true;
            }
        }

        // get all raw data
        $CI =& get_instance();
        $start_index=100;
        $limit_per_page = 10;

        $data=$CI->Bu_model->list_tanda_terima2();
        $record=array();
        foreach ($data as $row) {
          $asesor1='';
          $asesor2='';
          $get=$CI->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
          if(empty($get)){
            $status="0";
          }else{
            foreach($get as $row_revisi){
              if($row_revisi['status']=='0'){
                $status="1";
                break;
              }else{
                $status="2";
              }
            }
          }
          $check_penilaian=$CI->Bu_model->get_penilaian($row['NIB'],$row['tgl_permohonan']);
          for ($i=0; $i < count($check_penilaian) ; $i++) {
            if($i==0){
              $counter=$check_penilaian[$i]['id_asesor'];
              $asesor=$check_penilaian[$i]['Nama'];
              $asesor1=$check_penilaian[$i]['id_asesor'];
              if($check_penilaian[$i]['hasil_akhir']=='1'){
                $x="Sesuai";
              }else{
                $x="Tidak Sesuai";
              }
              $penilaian=$x;
            }else{
              if($counter!=$check_penilaian[$i]['id_asesor']){
                $asesor2=$check_penilaian[$i]['id_asesor'];
                $counter=$check_penilaian[$i]['id_asesor'];
                $asesor=$asesor.', '.$check_penilaian[$i]['Nama'];
                if($check_penilaian[$i]['hasil_akhir']=='0' AND $penilaian=='Sesuai'){

                  $x="Tidak Sesuai";
                }
                $penilaian=$x;
              }else{

                if($check_penilaian[$i]['hasil_akhir']=='0' AND $penilaian=='Sesuai'){
                  $x="Tidak Sesuai";
                }
                $penilaian=$x;
              }
            }

          }
          $datax=array(
            'asesor1'=>$asesor1,
            'asesor2'=>$asesor2,
            'no_urut'=>$row['no_urut'],
            'kbli'=>$row['concat_kbli'],
            'base_url'=>base_url(),

            'id1'=>encrypt_url($row['NIB']),
            'id2'=>encrypt_url($row['tgl_permohonan']),
            'id3'=>encrypt_url($asesor1),
            'id4'=>encrypt_url($asesor2),
            'qr'=>$row['qr'],
            'biaya_lsbu'=>$row['biaya_lsbu'],
            'file_perjanjian'=>$row['file_perjanjian'],
            'file_pembayaran'=>$row['file_pembayaran'],
            'status_0'=>$row['status_0'],
            'concat_sub'=>$row['concat_sub'],
            'concat_klasifikasi'=>$row['concat_klasifikasi'],
            'concat_kualifikasi'=>$row['concat_kualifikasi'],
            'nama'=>$row['nama'],
            'NIB'=>$row['NIB'],
            'tgl_permohonan'=>$row['tgl_permohonan'],
            'propinsi'=>$row['concat_sub'],
            'tahun'=>$row['tahun'],
            'status_1'=>$row['status_1'],
            'status_2'=>$row['status_2'],
            'status_3'=>$row['status_3'],
            'stat'=>$status,
          );
          array_push($record,$datax);
        }

        $alldata = json_decode(json_encode($record), true);
        $data = [];
        // internal use; filter selected columns only from raw data
        foreach ($alldata as $d) {
            $data[] = $this->filterArray($d, $this->columnsDefault);
        }

        // filter by general search keyword
        if (isset($_GET['search']['value']) && $_GET['search']['value']) {
            $data = $this->arraySearch($data, $_GET['search']['value']);
        }

        // count data
        $totalRecords = $totalDisplay = count($data);

        // sort
        if (isset($_GET['order'][0]['column']) && $_GET['order'][0]['dir']) {
            $column = $_GET['order'][0]['column'];
            $dir    = $_GET['order'][0]['dir'];
            usort($data, function ($a, $b) use ($column, $dir) {
                $a = array_slice($a, $column, 1);
                $b = array_slice($b, $column, 1);
                $a = array_pop($a);
                $b = array_pop($b);

                if ($dir === 'asc') {
                    return $a > $b ? 1 : -1;
                }

                return $a < $b ? 1 : -1;
            });
        }

        // pagination length
        if (isset($_GET['length'])) {
            $data = array_splice($data, $_GET['start'], $_GET['length']);
        }



        $result = [
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $totalDisplay,
            'data'            => $data,
        ];

        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function filterArray($array, $allowed = [])
    {
        return array_filter(
            $array,
            function ($val, $key) use ($allowed) { // N.b. $val, $key not $key, $val
                return isset($allowed[$key]) && ($allowed[$key] === true || $allowed[$key] === $val);
            },
            ARRAY_FILTER_USE_BOTH
        );
    }

    public function filterKeyword($data, $search, $field = '')
    {
        $filter = '';
        if (isset($search['value'])) {
            $filter = $search['value'];
        }
        if (!empty($filter)) {
            if (!empty($field)) {
                if (strpos(strtolower($field), 'date') !== false) {
                    // filter by date range
                    $data = $this->filterByDateRange($data, $filter, $field);
                } else {
                    // filter by column
                    $data = array_filter($data, function ($a) use ($field, $filter) {
                        return (boolean) preg_match("/$filter/i", $a[$field]);
                    });
                }

            } else {
                // general filter
                $data = array_filter($data, function ($a) use ($filter) {
                    return (boolean) preg_grep("/$filter/i", (array) $a);
                });
            }
        }

        return $data;
    }

    public function filterByDateRange($data, $filter, $field)
    {
        // filter by range
        if (!empty($range = array_filter(explode('|', $filter)))) {
            $filter = $range;
        }

        if (is_array($filter)) {
            foreach ($filter as &$date) {
                // hardcoded date format
                $date = date_create_from_format('m/d/Y', stripcslashes($date));
            }
            // filter by date range
            $data = array_filter($data, function ($a) use ($field, $filter) {
                // hardcoded date format
                $current = date_create_from_format('m/d/Y', $a[$field]);
                $from    = $filter[0];
                $to      = $filter[1];
                if ($from <= $current && $to >= $current) {
                    return true;
                }

                return false;
            });
        }

        return $data;
    }

    public function getJsonDecodex():mixed
    {
      $CI =& get_instance();
      $data=$CI->load->view('customers.json');

      return json_decode(file_get_contents($data), true);
      // $CI =& get_instance();
  		// $CI->load->model('bu/Bu_model');
      // $limit_per_page="100";
      // $start_index="1";
      // $record=$CI->Bu_model->search_permohonan_bu($limit_per_page, $start_index);
      // $response = array(
      //                 'recordsTotal'=>300,
      //                 'recordsFiltered'=>300,
      //                 'data' =>$record,
      //                 'start'=>$start_index
      //
      //               );
      //   return json_decode(json_encode($response), true);
    }

    /**
     * @param  array  $data
     *
     * @return array
     */
    public function reformat($data): array
    {
        return array_map(function ($item) {
            // hide credit card number
            $item['CreditCardNumber'] = '**** '.substr($item['CreditCardNumber'], -4);

            $item['CreditCardType'] = $item['CreditCardType'] === 'americanexpress' ? 'american-express' : $item['CreditCardType'];

            // reformat datetime
            $item['Datetime'] = date('d M Y, g:i a', strtotime($item['Datetime']));

            return $item;
        }, $data);
    }

    public function arraySearch($array, $keyword)
    {
        return array_filter($array, function ($a) use ($keyword) {
            return (boolean) preg_grep("/$keyword/i", (array) $a);
        });
    }

}
