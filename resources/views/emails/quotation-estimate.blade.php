<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quotation Estimate</title>
</head>

<body style="margin:0;padding:0;background:#f4f6fb;font-family:Arial,sans-serif;color:#111827;">

@php
    function numberToWordsBDT($number) {
        $number = (int) round($number);
        $words = [
            0=>'Zero',1=>'One',2=>'Two',3=>'Three',4=>'Four',
            5=>'Five',6=>'Six',7=>'Seven',8=>'Eight',9=>'Nine',
            10=>'Ten',11=>'Eleven',12=>'Twelve',13=>'Thirteen',
            14=>'Fourteen',15=>'Fifteen',16=>'Sixteen',
            17=>'Seventeen',18=>'Eighteen',19=>'Nineteen',
            20=>'Twenty',30=>'Thirty',40=>'Forty',50=>'Fifty',
            60=>'Sixty',70=>'Seventy',80=>'Eighty',90=>'Ninety',
        ];
        $convert = function ($num) use (&$convert, $words) {
            if ($num < 21) return $words[$num];
            if ($num < 100) return $words[(int)($num/10)*10].(($num%10)?' '.$words[$num%10]:'');
            if ($num < 1000) return $words[(int)($num/100)].' Hundred'.(($num%100)?' '.$convert($num%100):'');
            if ($num < 100000) return $convert((int)($num/1000)).' Thousand'.(($num%1000)?' '.$convert($num%1000):'');
            if ($num < 10000000) return $convert((int)($num/100000)).' Lakh'.(($num%100000)?' '.$convert($num%100000):'');
            return $convert((int)($num/10000000)).' Crore'.(($num%10000000)?' '.$convert($num%10000000):'');
        };
        return $convert($number).' Taka Only';
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

<div style="max-width:760px;margin:30px auto;background:#ffffff;border:1px solid #d8e3fb;">

    <div style="padding:42px 42px 30px;">

        <!-- HEADER -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td valign="top">
                    <!-- Logo icon + text -->
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td valign="middle" style="padding-right:10px;">
                                <div style="width:46px;height:46px;background:#093483;border-radius:50%;text-align:center;line-height:46px;color:#ffffff;font-weight:900;font-size:20px;font-family:Arial,sans-serif;">
                                    H
                                </div>
                            </td>
                            <td valign="middle">
                                <div style="color:#093483;font-size:22px;font-weight:800;font-family:Arial,sans-serif;line-height:1;">HSBLCO</div>
                                <div style="color:#6b7280;font-size:11px;font-family:Arial,sans-serif;margin-top:3px;">Driving Your Digital Solution</div>
                            </td>
                        </tr>
                    </table>
                </td>

                <td align="right" valign="top">
                    <div style="color:#093483;font-size:42px;font-weight:900;letter-spacing:1px;font-family:Arial,sans-serif;line-height:1;">QUOTATION</div>
                    <div style="margin-top:10px;font-size:15px;color:#111827;font-family:Arial,sans-serif;">
                        Quotation # QTN-{{ str_pad($estimate->id, 5, '0', STR_PAD_LEFT) }}
                    </div>
                    <div style="margin-top:6px;font-size:15px;color:#111827;font-family:Arial,sans-serif;">
                        Date: {{ $estimate->created_at->format('d M Y') }}
                    </div>
                </td>
            </tr>
        </table>

        <!-- DIVIDER -->
        <div style="border-top:1px dotted #b8c5dc;margin:34px 0;"></div>

        <!-- BILL TO / COMPANY INFO -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="50%" valign="top">
                    <div style="font-size:11px;color:#093483;font-weight:bold;letter-spacing:3px;margin-bottom:16px;font-family:Arial,sans-serif;">BILL TO</div>
                    <div style="font-size:17px;font-weight:bold;margin-bottom:8px;font-family:Arial,sans-serif;">{{ $estimate->quotation->name }}</div>
                    <div style="font-size:15px;margin-bottom:8px;font-family:Arial,sans-serif;">{{ $estimate->quotation->address ?? '-' }}</div>
                    <div style="font-size:15px;color:#003b93;margin-bottom:8px;font-family:Arial,sans-serif;">{{ $estimate->quotation->email }}</div>
                    <div style="font-size:15px;font-family:Arial,sans-serif;">{{ $estimate->quotation->phone }}</div>
                </td>
                <td width="50%" valign="top" align="right">
                    <div style="font-size:11px;color:#093483;font-weight:bold;letter-spacing:3px;margin-bottom:16px;font-family:Arial,sans-serif;">COMPANY INFO</div>
                    <div style="font-size:17px;font-weight:bold;margin-bottom:8px;font-family:Arial,sans-serif;">HSBLCO Solution</div>
                    <div style="font-size:15px;margin-bottom:8px;font-family:Arial,sans-serif;">Dhaka, Bangladesh</div>
                    <div style="font-size:15px;color:#003b93;font-family:Arial,sans-serif;">support@hsblco.com</div>
                </td>
            </tr>
        </table>

        <!-- ITEMS TABLE -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:48px;border-collapse:collapse;border:1px solid #d8e3fb;">
            <thead>
            <tr style="background:#093483;">
                <th align="left" style="padding:17px 20px;font-size:14px;letter-spacing:1px;color:#ffffff;font-family:Arial,sans-serif;font-weight:600;">DESCRIPTION</th>
                <th align="right" style="padding:17px 20px;font-size:14px;letter-spacing:1px;color:#ffffff;font-family:Arial,sans-serif;font-weight:600;">AMOUNT</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-family:Arial,sans-serif;">
                    <div style="font-size:15px;font-weight:bold;">{{ $estimate->quotation->service?->title }}</div>
                    <div style="font-size:13px;color:#4b5563;margin-top:3px;">Service Charge</div>
                </td>
                <td align="right" style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;">
                     {{ number_format($estimate->service_charge, 2) }}
                </td>
            </tr>
            <tr>
                <td style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;">Domain Charge</td>
                <td align="right" style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;"> {{ number_format($estimate->domain_charge, 2) }}</td>
            </tr>
            <tr>
                <td style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;">Hosting Charge</td>
                <td align="right" style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;"> {{ number_format($estimate->hosting_charge, 2) }}</td>
            </tr>
            <tr>
                <td style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;">Yearly Charge</td>
                <td align="right" style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;"> {{ number_format($estimate->yearly_charge, 2) }}</td>
            </tr>
            <tr>
                <td style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;">Monthly Charge</td>
                <td align="right" style="padding:18px 20px;border-bottom:1px solid #d8e3fb;font-size:15px;font-family:Arial,sans-serif;"> {{ number_format($estimate->monthly_charge, 2) }}</td>
            </tr>
            </tbody>
        </table>

        <!-- NOTES & TOTALS -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:52px;">
            <tr>
                <td width="52%" valign="top">
                    <div style="font-size:11px;color:#093483;font-weight:bold;letter-spacing:3px;margin-bottom:16px;font-family:Arial,sans-serif;">NOTES &amp; INSTRUCTIONS</div>
                    <div style="background:#f0f3ff;border:1px solid #cfdaf2;padding:22px;font-size:14px;line-height:1.8;color:#111827;font-family:Arial,sans-serif;">
                        @if($estimate->note)
                            {{ $estimate->note }}
                        @else
                            <ul style="margin:0;padding-left:20px;">
                                <li style="margin-bottom:4px;">This quotation is valid for 15 days.</li>
                                <li style="margin-bottom:4px;">Payment terms will be finalized after approval.</li>
                                <li style="margin-bottom:4px;">Project timeline depends on final requirements.</li>
                                <li>Thank you for choosing HSBLCO Solution.</li>
                            </ul>
                        @endif
                    </div>
                </td>

                <td width="6%"></td>

                <td width="42%" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td style="padding:8px 0;font-size:15px;color:#111827;font-family:Arial,sans-serif;">Subtotal</td>
                            <td align="right" style="padding:8px 0;font-size:15px;color:#111827;font-family:Arial,sans-serif;"> {{ number_format($subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <td style="padding:8px 0;font-size:15px;color:#111827;font-family:Arial,sans-serif;">Discount</td>
                            <td align="right" style="padding:8px 0;font-size:15px;color:#dc2626;font-family:Arial,sans-serif;">-  {{ number_format($discount, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-top:1px solid #d1d5db;padding-top:2px;"></td>
                        </tr>
                        <tr>
                            <td style="padding-top:18px;color:#093483;font-size:28px;font-weight:bold;font-family:Arial,sans-serif;">Total</td>
                            <td align="right" style="padding-top:18px;color:#093483;font-size:32px;font-weight:bold;font-family:Arial,sans-serif;"> {{ number_format($total, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" style="padding-top:12px;color:#093483;font-size:14px;font-weight:500;font-family:Arial,sans-serif;">
                                ({{ numberToWordsBDT($total) }})
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- SIGNATURE ROW -->
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:70px;border-top:1px solid #d1d5db;padding-top:36px;">
            <tr>
                <td style="font-size:13px;color:#374151;font-style:italic;font-family:Arial,sans-serif;padding-top:36px;">
                    This quotation is electronically generated by HSBLCO Solution.
                </td>
                <td align="right" style="width:250px;padding-top:36px;">
                    <div style="border-top:1px solid #111827;width:220px;margin-left:auto;padding-top:10px;text-align:center;font-size:13px;color:#111827;font-style:italic;font-family:Arial,sans-serif;">
                        Authorized Signature
                    </div>
                </td>
            </tr>
        </table>

    </div>

    <!-- PAGE FOOTER -->
    <div style="background:#eef2ff;border-top:1px solid #d8e3fb;text-align:center;padding:18px 20px;">
        <span style="color:#093483;font-weight:bold;font-size:13px;font-family:Arial,sans-serif;">Payment Terms</span>
        <span style="margin:0 18px;color:#6b7280;font-family:Arial,sans-serif;">|</span>
        <span style="color:#093483;font-weight:bold;font-size:13px;font-family:Arial,sans-serif;">Privacy Policy</span>
        <span style="margin:0 18px;color:#6b7280;font-family:Arial,sans-serif;">|</span>
        <span style="color:#093483;font-weight:bold;font-size:13px;font-family:Arial,sans-serif;">Contact Support</span>
        <div style="margin-top:14px;color:#4b5563;font-size:13px;font-family:Arial,sans-serif;">
            © {{ date('Y') }} HSBLCO. All rights reserved.
        </div>
    </div>

</div>

</body>
</html>
