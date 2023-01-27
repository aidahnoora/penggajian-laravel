<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
        @page { size: A4 }

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
            border:1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border:1px solid #000000;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left{
            text-align: left;
        }

        .bendahara {
            text-align: right;
            width: 200px;
        }
    </style>
</head>
<body class="A4 landscape">
    <section class="sheet padding-10mm">
        <h1>Laporan Gaji Pegawai</h1>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Pinjaman</th>
                    <th>Potongan</th>
                    <th>Gaji</th>
                    <th>Bulan Tahun</th>
                    <th>No. Rekening</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salaries as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td class="text-center">{{ $item->employee->name }}</td>
                    <td class="text-center">{{ $item->employee->position->name }}</td>
                    <td class="text-right">Rp <?php echo number_format($item->remaining_loan) ?></td>
                    <td class="text-right">Rp <?php echo number_format($item->salary_cut) ?></td>
                    <td class="text-right">Rp <?php echo number_format($item->nominal) ?></td>
                    <td class="text-center">{{ $item->month }}, {{ $item->year }}</td>
                    <td class="text-center">{{ $item->employee->account_number }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table width="100%">
            <tr>
                <td class="bendahara">
                    <p>Pacitan, <?php echo date('d F Y'); ?> <br> Bendahara,</p>
                    <br>
                    <br>
                    <p>___________________</p>
                </td>
            </tr>
        </table>
    </section>
</body>

<script type="text/javascript">
    var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet){
    style.styleSheet.cssText = css;
    } else {
    style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);

    window.print();
</script>

</html>
