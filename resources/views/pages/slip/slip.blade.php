<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        @page {
            size: A4
        }

        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .bendahara {
            text-align: right;
            width: 200px;
        }
    </style>
</head>

<body class="A5">
    <section class="sheet padding-10mm">
        <h1>Slip Gaji Pegawai</h1>
        <form action="{{ route('slip', $salary->id) }}" method="get">
            @csrf
            @method('put')

            <table style="width: 100%">
                <tr>
                    <td width="30%">Nama Pegawai</td>
                    <td width="2%">:</td>
                    <td><?php echo $salary->employee->name?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?php echo $salary->employee->position->name?></td>
                </tr>
                <tr>
                    <td>Bulan</td>
                    <td>:</td>
                    <td><?php echo $salary->month ?></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td><?php echo $salary->year ?></td>
                </tr>
                <tr>
                    <td>Nomor Rekening</td>
                    <td>:</td>
                    <td><?php echo $salary->employee->account_number ?></td>
                </tr>
            </table>

            <table class="table table-striped table-bordered mt-3" style="margin-top: 20px; margin-bottom: 20px">
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center" >Keterangan</th>
                    <th class="text-center" >Jumlah</th>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Gaji Pokok</td>
                    <td class="text-right">Rp. <?php echo number_format($salary->employee->position->salary) ?></td>
                </tr>

                <tr>
                    <td class="text-center">2</td>
                    <td>Tunjangan Transportasi</td>
                    <td class="text-right">Rp. <?php echo number_format($salary->employee->position->transport_allowance) ?></td>
                </tr>

                <tr>
                    <td class="text-center">3</td>
                    <td>Uang Makan</td>
                    <td class="text-right">Rp. <?php echo number_format($salary->employee->position->meal_allowance) ?></td>
                </tr>

                <tr>
                    <td class="text-center">4</td>
                    <td>Pemotongan</td>
                    <td class="text-right">Rp. <?php echo number_format($salary->salary_cut) ?></td>
                </tr>

                <tr>
                    <th colspan="2" style="text-align: right;">Total Gaji : </th>
                    <th class="text-right">Rp. <?php echo number_format($salary->nominal) ?></th>
                </tr>

                <tr>
                    <th colspan="2" style="text-align: right;">Sisa Pinjaman : </th>
                    <th class="text-right">Rp. <?php echo number_format($salary->remaining_loan) ?></th>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td></td>
                    <td>
                        <p>Pegawai</p>
                        <br>
                        <br>
                        <p class="font-weight-bold"><?php echo $salary->employee->name ?></p>
                    </td>

                    <td width="200px">
                        <p>Pacitan, <?php echo date('d F Y'); ?> <br> Bendahara,</p>
                        <br>
                        <br>
                        <p>___________________</p>
                    </td>
                </tr>
            </table>
        </form>
    </section>
</body>

<script type="text/javascript">
    // window.print();
</script>

</html>
