<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quotation Estimate</title>
</head>

<body style="margin:0;padding:0;background:#f4f6fb;font-family:Arial,sans-serif;color:#111827;">

@php
    $subtotal =
        ($estimate->service_charge ?? 0) +
        ($estimate->domain_charge ?? 0) +
        ($estimate->hosting_charge ?? 0) +
        ($estimate->yearly_charge ?? 0) +
        ($estimate->monthly_charge ?? 0);

    $discount = $estimate->discount ?? 0;
    $total = $subtotal - $discount;
@endphp

<div style="max-width:760px;margin:30px auto;background:#ffffff;border:1px solid #e5e7eb;padding:40px;">

    <table width="100%">
        <tr>
            <td>
                <h2 style="color:#093483;margin:0;">HSBLCO Solution</h2>
            </td>

            <td align="right">
                <h1 style="color:#093483;margin:0;font-size:36px;">QUOTATION</h1>

                <p style="margin:5px 0;font-size:13px;">
                    Quotation #
                    QTN-{{ str_pad($estimate->id, 5, '0', STR_PAD_LEFT) }}
                </p>

                <p style="margin:5px 0;font-size:13px;">
                    Date: {{ $estimate->created_at->format('d M Y') }}
                </p>
            </td>
        </tr>
    </table>

    <hr style="border:none;border-top:1px dotted #d1d5db;margin:30px 0;">

    <table width="100%">
        <tr>
            <td valign="top">
                <p style="font-size:12px;color:#00658d;font-weight:bold;letter-spacing:1px;">BILL TO</p>
                <p style="margin:0;font-weight:bold;">{{ $estimate->quotation->name }}</p>
                <p style="margin:4px 0;">{{ $estimate->quotation->address ?? '-' }}</p>
                <p style="margin:4px 0;">{{ $estimate->quotation->email }}</p>
                <p style="margin:4px 0;">{{ $estimate->quotation->phone }}</p>
            </td>

            <td align="right" valign="top">
                <p style="font-size:12px;color:#00658d;font-weight:bold;letter-spacing:1px;">COMPANY INFO</p>
                <p style="margin:0;font-weight:bold;">HSBLCO Solution</p>
                <p style="margin:4px 0;">Dhaka, Bangladesh</p>
                <p style="margin:4px 0;">support@hsblco.com</p>
            </td>
        </tr>
    </table>

    <table width="100%" cellspacing="0" cellpadding="12" style="margin-top:35px;border-collapse:collapse;">
        <thead>
        <tr style="background:#093483;color:white;">
            <th align="left">Description</th>
            <th align="right">Amount</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td style="border-bottom:1px solid #e5e7eb;">
                <strong>{{ $estimate->quotation->service?->title }}</strong><br>
                <small>Service Charge</small>
            </td>
            <td align="right" style="border-bottom:1px solid #e5e7eb;">
                 {{ number_format($estimate->service_charge, 2) }}
            </td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid #e5e7eb;">Domain Charge</td>
            <td align="right" style="border-bottom:1px solid #e5e7eb;">
                 {{ number_format($estimate->domain_charge, 2) }}
            </td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid #e5e7eb;">Hosting Charge</td>
            <td align="right" style="border-bottom:1px solid #e5e7eb;">
                 {{ number_format($estimate->hosting_charge, 2) }}
            </td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid #e5e7eb;">Yearly Charge</td>
            <td align="right" style="border-bottom:1px solid #e5e7eb;">
                 {{ number_format($estimate->yearly_charge, 2) }}
            </td>
        </tr>

        <tr>
            <td style="border-bottom:1px solid #e5e7eb;">Monthly Charge</td>
            <td align="right" style="border-bottom:1px solid #e5e7eb;">
                 {{ number_format($estimate->monthly_charge, 2) }}
            </td>
        </tr>
        </tbody>
    </table>

    <table width="100%" style="margin-top:30px;">
        <tr>
            <td width="55%" valign="top">

                <p style="font-size:12px;color:#00658d;font-weight:bold;letter-spacing:1px;">
                    NOTES & INSTRUCTIONS
                </p>

                <div style="background:#f0f3ff;border:1px dotted #c4c6d3;padding:15px;font-size:13px;line-height:1.6;">
                    @if($estimate->note)
                        {{ $estimate->note }}
                    @else
                        This quotation is valid for 15 days.
                    @endif
                </div>

            </td>

            <td width="40%" valign="top" align="right">

                <table width="100%" style="border-collapse:collapse;font-size:14px;">
                    <tr>
                        <td align="left" style="padding:7px 0;color:#444651;">Subtotal</td>
                        <td align="right" style="padding:7px 0;">
                             {{ number_format($subtotal, 2) }}
                        </td>
                    </tr>

                    <tr>
                        <td align="left" style="padding:7px 0;color:#444651;">Discount</td>
                        <td align="right" style="padding:7px 0;color:#dc2626;">
                            -  {{ number_format($discount, 2) }}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="border-top:1px solid #d1d5db;padding-top:12px;"></td>
                    </tr>

                    <tr>
                        <td align="left" style="color:#093483;font-size:22px;font-weight:bold;">
                            Total
                        </td>

                        <td align="right" style="color:#093483;font-size:28px;font-weight:bold;">
                             {{ number_format($total, 2) }}
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top:60px;border-top:1px solid #e5e7eb;padding-top:35px;">
        <tr>
            <td style="font-size:13px;color:#6b7280;font-style:italic;">
                This quotation is electronically generated by HSBLCO Solution.
            </td>

            <td align="right" style="width:220px;">
                <div style="border-top:1px solid #111827;width:180px;margin-left:auto;padding-top:8px;text-align:center;font-size:12px;color:#444651;font-style:italic;">
                    Authorized Signature
                </div>
            </td>
        </tr>
    </table>

</div>

</body>
</html>
