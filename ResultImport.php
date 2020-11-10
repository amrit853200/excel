<?php

namespace App\Imports;

use App\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Auth; 

class ResultImport implements ToModel, WithStartRow
{
    public function __construct($request_id) {
        // dd($request_id);
        $this->courseID = $request_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd(Date::excelToDateTimeObject($row[7])->format('Y-m-d'));
        if (isset($row[6])) {
        $result = Result::Create([
            'average_grade' => $row[0],
            'course_id' => $this->courseID,
            'semester' => $row[2],
            'year' => $row[3],
            'institute' => $row[4],
            'regd_no' => $row[5],
            'symbol_no' => $row[6],
            'name' => $row[7],
            'dob' => Date::excelToDateTimeObject($row[8])->format('Y-m-d'),
            // 'average_grade' => $row[8],
            'sgpa' => $row[9],
            'result' => $row[10],
            'created_by' => Auth::user()->name,
        ]);
        }
       
        // $max = count($row);
        // $i = 10;
        // for($i;$i<=$max;$i+5){
        //     if (isset($row[$i])) {
        //         $result->marks()->create([
        //             'subject_code'=> $row[$i],
        //             'subject_title' => $row[$i+1],
        //             'grade_point'=> $row[$i+2],
        //             'grade'=> $row[$i+3],
        //             'remarks'=> $row[$i+4],
        //         ]);
        //     }
        // }

        if (isset($row[11])) {
            $result->marks()->create([
                'subject_code'=> $row[11],
                'subject_title' => $row[12],
                'credit_hrs' => $row[13],
                'grade_point'=> $row[14],
                'grade'=> $row[15],
                'remarks'=> $row[16],
            ]);
        }
        if (isset($row[17])) {
            $result->marks()->create([
                'subject_code'=> $row[17],
                'subject_title' => $row[18],
                'credit_hrs' => $row[19],
                'grade_point'=> $row[20],
                'grade'=> $row[21],
                'remarks'=> $row[22],
            ]);
        }
        if (isset($row[23])) {
            $result->marks()->create([
                'subject_code'=> $row[23],
                'subject_title' => $row[24],
                'credit_hrs' => $row[25],
                'grade_point'=> $row[26],
                'grade'=> $row[27],
                'remarks'=> $row[28],
            ]);
        }
        if (isset($row[29])) {
            $result->marks()->create([
                'subject_code'=> $row[29],
                'subject_title' => $row[30],
                'credit_hrs' => $row[31],
                'grade_point'=> $row[32],
                'grade'=> $row[33],
                'remarks'=> $row[34],
            ]);
        }
        if (isset($row[35])) {
            $result->marks()->create([
                'subject_code'=> $row[35],
                'subject_title' => $row[36],
                'credit_hrs' => $row[37],
                'grade_point'=> $row[38],
                'grade'=> $row[39],
                'remarks'=> $row[40],
            ]);
        }
        if (isset($row[41])) {
            $result->marks()->create([
                'subject_code'=> $row[41],
                'subject_title' => $row[42],
                'credit_hrs' => $row[43],
                'grade_point'=> $row[44],
                'grade'=> $row[45],
                'remarks'=> $row[46],
            ]);
        }
        return $result;         
              
    }

    /**
    * @return int
    */
    public function startRow(): int
    {
        return 2;
    }
}
