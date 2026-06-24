<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quotation Estimate</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111827;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .total {
            font-weight: bold;
            background: #f3f4f6;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>HSBLCO Solution</h2>
    <p>Quotation Estimate</p>
</div>

<p><strong>Client:</strong> {{ $estimate->quotation->name }}</p>
<p><strong>Email:</strong> {{ $estimate->quotation->email }}</p>
<p><strong>Service:</strong> {{ $estimate->quotation->service?->title }}</p>
<p><strong>Date:</strong> {{ $estimate->created_at->format('d M Y, h:i A') }}</p>

<table>
    <tr>
        <th>Description</th>
        <th>Amount</th>
    </tr>

    <tr>
        <td>Service Charge</td>
        <td>BDT {{ number_format($estimate->service_charge, 2) }}</td>
    </tr>

    <tr>
        <td>Domain Charge</td>
        <td>BDT {{ number_format($estimate->domain_charge, 2) }}</td>
    </tr>

    <tr>
        <td>Hosting Charge</td>
        <td>BDT {{ number_format($estimate->hosting_charge, 2) }}</td>
    </tr>

    <tr>
        <td>Yearly Charge</td>
        <td>BDT {{ number_format($estimate->yearly_charge, 2) }}</td>
    </tr>

    <tr>
        <td>Monthly Charge</td>
        <td>BDT {{ number_format($estimate->monthly_charge, 2) }}</td>
    </tr>

    <tr>
        <td>Discount</td>
        <td>BDT {{ number_format($estimate->discount, 2) }}</td>
    </tr>

    <tr class="total">
        <td>Total</td>
        <td>BDT {{ number_format($estimate->total, 2) }}</td>
    </tr>
</table>

@if($estimate->note)
    <p><strong>Note:</strong> {{ $estimate->note }}</p>
@endif

<br>

<p>
    Regards,<br>
    <strong>HSBLCO Solution</strong><br>
    info@hsblco.com
</p>

</body>
</html>
