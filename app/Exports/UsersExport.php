<?php

namespace App\Exports;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\User;

class UsersExport implements
    FromQuery,
    Responsable,
    WithMapping,
    WithHeadings,
    WithTitle
{
  use Exportable;

  private $fileName = 'users_export.xlsx';

  public function __construct()
  {

  }

  public function query()
  {
      return User::orderBy('email','desc');
  }


  public function map($row): array
  {
      return [
          $row->firstname,
          $row->lastname,
          $row->email,
          $row->status,
          $row->hidden,
          $row->last_login
      ];
  }

  public function headings(): array
  {
     return [
       'firstname',
       'lastname',
       'email',
       'status',
       'hidden',
       'last_login'
     ];
  }

  public function title(): string
  {
      return 'Lista de usuarios';
  }
}
