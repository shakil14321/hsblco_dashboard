<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quotation Estimate</title>

    <style>
        @page {
            margin: 14px;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #111827;
            font-size: 11px;
            background: #ffffff;
        }

        .page {
            width: 100%;
            background: #ffffff;
            border: 1px solid #d8e3fb;
        }

        .content {
            padding: 24px 28px 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .blue {
            color: #093483;
        }

        .logo-title {
            margin: 0;
            font-size: 24px;
            font-weight: 900;
            color: #093483;
        }

        .logo-subtitle {
            margin: 0;
            font-size: 8px;
            color: #6b7280;
        }

        .title {
            margin: 0;
            font-size: 34px;
            font-weight: 900;
            color: #093483;
            letter-spacing: 1px;
            line-height: 1;
        }

        .meta {
            margin: 6px 0 0;
            font-size: 10px;
            color: #111827;
        }

        .divider {
            border: none;
            border-top: 1px dotted #9db3df;
            margin: 24px 0;
        }

        .section-title {
            margin: 0 0 10px;
            color: #093483;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .info-name {
            margin: 0 0 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .info-line {
            margin: 0 0 5px;
            font-size: 10px;
        }

        .info-email {
            margin: 0 0 5px;
            font-size: 10px;
            color: #003b93;
        }

        .items {
            margin-top: 28px;
            border: 1px solid #d8e3fb;
        }

        .items th {
            background: #093483;
            color: #ffffff;
            padding: 11px 12px;
            font-size: 10px;
            letter-spacing: 1px;
        }

        .items td {
            padding: 11px 12px;
            border-bottom: 1px solid #d8e3fb;
            font-size: 10px;
        }

        .service-title {
            font-size: 11px;
            font-weight: bold;
        }

        .small {
            font-size: 9px;
            color: #4b5563;
        }

        .summary {
            margin-top: 28px;
        }

        .notes-box {
            background: #f0f3ff;
            border: 1px solid #cfdaf2;
            padding: 12px 14px;
            font-size: 10px;
            line-height: 1.6;
            min-height: 75px;
        }

        .notes-box ul {
            margin: 0;
            padding-left: 16px;
        }

        .notes-box li {
            margin-bottom: 5px;
        }

        .total-table td {
            font-size: 11px;
            padding: 5px 0;
        }

        .total-separator {
            border-top: 1px solid #d1d5db;
            padding-top: 10px;
        }

        .total-label {
            color: #093483;
            font-size: 18px !important;
            font-weight: bold;
        }

        .total-value {
            color: #093483;
            font-size: 25px !important;
            font-weight: bold;
            white-space: nowrap;
        }

        .word-total {
            color: #093483;
            font-size: 10px;
            font-weight: 600;
            padding-top: 7px;
        }

        .footer {
            margin-top: 34px;
            border-top: 1px solid #d1d5db;
            padding-top: 18px;
        }

        .signature {
            border-top: 1px solid #111827;
            width: 160px;
            margin-left: auto;
            padding-top: 6px;
            text-align: center;
            font-size: 9px;
            font-style: italic;
        }
    </style>
</head>

<body>

@php
    function quotationAmountInWords($amount)
    {
        $amount = (int) round($amount);

        $words = [
            0 => 'Zero', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four',
            5 => 'Five', 6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen',
            14 => 'Fourteen', 15 => 'Fifteen', 16 => 'Sixteen',
            17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen',
            20 => 'Twenty', 30 => 'Thirty', 40 => 'Forty', 50 => 'Fifty',
            60 => 'Sixty', 70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety',
        ];

        $convert = function ($num) use (&$convert, $words) {
            if ($num < 21) {
                return $words[$num];
            }

            if ($num < 100) {
                return $words[(int)($num / 10) * 10] . (($num % 10) ? ' ' . $words[$num % 10] : '');
            }

            if ($num < 1000) {
                return $words[(int)($num / 100)] . ' Hundred' . (($num % 100) ? ' ' . $convert($num % 100) : '');
            }

            if ($num < 100000) {
                return $convert((int)($num / 1000)) . ' Thousand' . (($num % 1000) ? ' ' . $convert($num % 1000) : '');
            }

            if ($num < 10000000) {
                return $convert((int)($num / 100000)) . ' Lakh' . (($num % 100000) ? ' ' . $convert($num % 100000) : '');
            }

            return $convert((int)($num / 10000000)) . ' Crore' . (($num % 10000000) ? ' ' . $convert($num % 10000000) : '');
        };

        return $convert($amount) . ' Taka Only';
    }

    $subtotal =
        ($estimate->service_charge ?? 0) +
        ($estimate->domain_charge ?? 0) +
        ($estimate->hosting_charge ?? 0) +
        ($estimate->yearly_charge ?? 0) +
        ($estimate->monthly_charge ?? 0);

    $discount = $estimate->discount ?? 0;
    $total = $subtotal - $discount;
@endphp

<div class="page">
    <div class="content">

        <table>
            <tr>
                <td valign="top">
                    <h1 class="logo-title">HSBLCO</h1>
                    <p class="logo-subtitle">Driving Your Digital Solution</p>
                </td>

                <td align="right" valign="top">
                    <h1 class="title">QUOTATION</h1>

                    <p class="meta">
                        Quotation #
                        QTN-{{ str_pad($estimate->id, 5, '0', STR_PAD_LEFT) }}
                    </p>

                    <p class="meta">
                        Date:
                        {{ $estimate->created_at->format('d M Y') }}
                    </p>
                </td>
            </tr>
        </table>

        <hr class="divider">

        <table>
            <tr>
                <td width="50%" valign="top">
                    <p class="section-title">BILL TO</p>

                    <p class="info-name">
                        {{ $estimate->quotation->name }}
                    </p>

                    <p class="info-line">
                        {{ $estimate->quotation->address ?? '-' }}
                    </p>

                    <p class="info-email">
                        {{ $estimate->quotation->email }}
                    </p>

                    <p class="info-line">
                        {{ $estimate->quotation->phone }}
                    </p>
                </td>

                <td width="50%" align="right" valign="top">
                    <p class="section-title">COMPANY INFO</p>

                    <p class="info-name">HSBLCO Solution</p>

                    <p class="info-line">Dhaka, Bangladesh</p>

                    <p class="info-email">support@hsblco.com</p>
                </td>
            </tr>
        </table>

        <table class="items">
            <thead>
            <tr>
                <th align="left">DESCRIPTION</th>
                <th align="right">AMOUNT</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>
                    <span class="service-title">
                        {{ $estimate->quotation->service?->title }}
                    </span>
                    <br>
                    <span class="small">Service Charge</span>
                </td>
                <td align="right">
                    {{ number_format($estimate->service_charge, 2) }}
                </td>
            </tr>

            <tr>
                <td>Domain Charge</td>
                <td align="right">{{ number_format($estimate->domain_charge, 2) }}</td>
            </tr>

            <tr>
                <td>Hosting Charge</td>
                <td align="right">{{ number_format($estimate->hosting_charge, 2) }}</td>
            </tr>

            <tr>
                <td>Yearly Charge</td>
                <td align="right">{{ number_format($estimate->yearly_charge, 2) }}</td>
            </tr>

            <tr>
                <td>Monthly Charge</td>
                <td align="right">{{ number_format($estimate->monthly_charge, 2) }}</td>
            </tr>
            </tbody>
        </table>

        <table class="summary">
            <tr>
                <td width="52%" valign="top">
                    <p class="section-title">NOTES & INSTRUCTIONS</p>

                    <div class="notes-box">
                        @if($estimate->note)
                            {{ $estimate->note }}
                        @else
                            <ul>
                                <li>This quotation is valid for 15 days.</li>
                                <li>Payment terms will be finalized after approval.</li>
                                <li>Project timeline depends on final requirements.</li>
                                <li>Thank you for choosing HSBLCO Solution.</li>
                            </ul>
                        @endif
                    </div>
                </td>

                <td width="8%"></td>

                <td width="40%" valign="top">
                    <table class="total-table">
                        <tr>
                            <td align="left">Subtotal</td>
                            <td align="right">
                                {{ number_format($subtotal, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td align="left">Discount</td>
                            <td align="right" style="color:#dc2626;">
                                - {{ number_format($discount, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class="total-separator"></td>
                        </tr>

                        <tr>
                            <td align="left" class="total-label">Total</td>
                            <td align="right" class="total-value">
                                {{ number_format($total, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" align="right" class="word-total">
                                ({{ quotationAmountInWords($total) }})
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table class="footer">
            <tr>
                <td style="font-size:10px;color:#374151;font-style:italic;">
                    This quotation is electronically generated by HSBLCO Solution.
                </td>

                <td align="right" style="width:190px;">
                    <div class="signature">
                        Authorized Signature
                    </div>
                </td>
            </tr>
        </table>

    </div>
</div>

</body>
</html>
