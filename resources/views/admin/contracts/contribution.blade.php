@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <transition name="fade" appear>
        <div class="row justify-content-center">
            <div class="col-md-9 width-for-print">
                <div class="jumbotron none-print mb-3 p-2">
                    <div class="d-flex justify-content-between">
                        <a href="{{URL::previous()}}" ><i class="fas fa-arrow-left"></i> счета</a>
                        <a href="#" @click.prevent="printWindow"><i class="fas fa-print"></i> печать pdf</a>
                    </div>
                </div>
                <div class="card rounded-0">
                    <div class="card-body">
                        <p style="text-align: center;"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">Договор № {{ $contract->id }}</span></p>
                        <p style="text-align: right;">{{ $contract->created_at->format('d.m.Y') }}</p>
                        <p style="text-align: justify; text-indent: 35.45pt;"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">ПУБЛИЧНОЕ АКЦИОНЕРНОЕ ОБЩЕСТВО &laquo;</span><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">PocketMoney</span><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">&raquo; именуемое в дальнейшем &laquo;БАНК&raquo;, с одной стороны, и {{ $contract->account->client->surname }} {{ $contract->account->client->name }} {{ $contract->account->client->patronymic }} (ФИО) именуемый в дальнейшем &laquo;ВКЛАДЧИК&raquo;, с другой стороны, заключили настоящий Договор о нижеследующем: </span></p>
                        <ul>
                            <li style="text-align: center; margin: 12.0pt 0cm .0001pt 0cm;list-style: none"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">1. ПРЕДМЕТ ДОГОВОРА</span></li>
                        </ul>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">1.1. ВКЛАДЧИК вносит, а БАНК принимает денежные средства (вклад) в сумме и валюте согласно Договору, обязуется возвратить сумму вклада и выплатить причитающиеся проценты на условиях и в порядке, предусмотренных Договором. Для учета денежных средств, вносимых ВКЛАДЧИКОМ на основании Договора, БАНК открывает ВКЛАДЧИКУ счет вклада. </span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">1.2. К вкладу применяются Условия размещения вкладов (далее &ndash; Условия) и Тарифы БАНКА за совершение операций по счету вклада (далее-Тарифы), действующие на дату подписания Договора, а при его пролонгации &ndash; на дату пролонгации Договора. ВКЛАДЧИК ознакомлен и согласен с Условиями и Тарифами.</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">1.3. БАНК информирует ВКЛАДЧИКА об изменении Условий, Тарифов, процентных ставок по вкладу посредством размещения соответствующих сведений в подразделениях БАНКА, осуществляющих операции по вкладам физических лиц в доступном для ознакомления вкладчиков месте, на официальном сайте БАНКА в сети Интернет.</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">1.4. ВКЛАДЧИК поручает БАНКУ перечислять со счета вклада суммы, предусмотренные пунктом 3.2.1.1. Условий, а также в иных случаях, установленных настоящим Договором.</span></p>
                        <ul start="2">
                            <li style="text-align: center; margin: 12.0pt 0cm .0001pt 0cm;list-style: none"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">2. ОСНОВНЫЕ УСЛОВИЯ ДОГОВОРА</span></li>
                        </ul>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">2.1. Сумма вклада:  {{ $contract->amount }} Руб.</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">2.2. Срок вклада: {{ $contract->period }} дней.</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">2.3. Дата окончания срока вклада: {{ $contract->expirationDate->format('d.m.Y') }}</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">2.4. Процентная ставка по вкладу: {{ $contract->percent }}%</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">ВКЛАДЧИК ознакомлен и согласен с установленными в ПАО &laquo;</span><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">PocketMoney</span><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">&raquo; условиями совершения переводов, тарифами и порядком взимания платы.</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">ВКЛАДЧИК согласен с тем, что плата за перевод (при наличии) списывается со счёта вклада, с которого осуществляется перевод № {{ $contract->id }} (номер счета вклада).</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">ВКЛАДЧИК подтверждает, что данный перевод не связан с осуществлением им предпринимательской деятельности.</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">ВКЛАДЧИК согласен/ не согласен (нужное подчеркнуть) на перечисление процентов, выплачиваемых в соответствии с Договором, на счет банковской карты/ на другой счет по вкладу, открытый в БАНКЕ.</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify; text-indent: 35.45pt; line-height: 115%;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">ВКЛАДЧИК согласен на получение от БАНКА информационных и рекламных сообщений по вкладам. Согласие может быть отозвано ВКЛАДЧИКОМ в любой момент путем передачи БАНКУ подписанного ВКЛАДЧИКОМ письменного уведомления.</span></p>
                        <p style="margin-bottom: .0001pt; text-align: justify;"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                        <ul start="3">
                            <li style="text-align: center; margin: 12.0pt 0cm .0001pt 0cm;list-style: none"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">3. АДРЕСА И РЕКВИЗИТЫ СТОРОН</span></li>
                        </ul>
                        <table style="width: 467.25pt; border-collapse: collapse; border: none;" width="623">
                            <tbody>
                            <tr>
                                <td style="width: 191.15pt; border: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="255">
                                    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">БАНК</span></p>
                                </td>
                                <td style="width: 276.1pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt;" width="368">
                                    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">ВКЛАДЧИК</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 191.15pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" width="255">
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">ПАО &laquo;</span><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">PocketMoney</span><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&raquo;</span></p>
                                </td>
                                <td style="width: 276.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="368">
                                    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;">{{ $contract->account->client->surname }} {{ $contract->account->client->name }} {{ $contract->account->client->patronymic }}</p>
                                </td>
                            </tr>
                            <tr style="height: 25.1pt;">
                                <td style="width: 191.15pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 25.1pt;" rowspan="3" width="255">
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">КБК 0000000000000000000</span></p>
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">КПП 0000000000</span></p>
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">БИК 0000000000</span></p>
                                </td>
                                <td style="width: 276.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 25.1pt;" width="368">
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Адрес регистрации: {{ $contract->account->client->address }}</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 276.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="368">
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Адрес электронной почты: {{ $contract->account->client->user->email }}</span></p>
                                </td>
                            </tr>
                            <tr style="height: 29.3pt;">
                                <td style="width: 276.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 29.3pt;" width="368">
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Паспорт</span></p>
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Серия: {{ $contract->account->client->series }}</span></p>
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Номер: {{ $contract->account->client->number }}</span></p>
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Кем и когда выдан: {{ $contract->account->client->issued }} {{ $contract->account->client->dateOfIssues ?  $contract->account->client->dateOfIssues->format('d.m.Y') : '' }}</span></p>
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Дата рождения</span><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">:</span> {{ $contract->account->client->dateOfBirth ? $contract->account->client->dateOfBirth->format('d.m.Y') : '' }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 191.15pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" width="255">
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                </td>
                                <td style="width: 276.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="368">
                                    <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 467.25pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt;" colspan="2" width="623">
                                    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">ПОДПИСИ СТОРОН</span></p>
                                </td>
                            </tr>
                            <tr style="height: 15.65pt;">
                                <td style="width: 191.15pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.65pt;" width="255">
                                    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">БАНК</span></p>
                                </td>
                                <td style="width: 276.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.65pt;" width="368">
                                    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">ВКЛАДЧИК</span></p>
                                </td>
                            </tr>
                            <tr style="height: 15.65pt;">
                                <td style="width: 191.15pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.65pt;" width="255">
                                    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">____________________</span></p>
                                </td>
                                <td style="width: 276.1pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.65pt;" width="368">
                                    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">____________________</span></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <p style="margin-bottom: .0001pt;"><span style="font-size: 12.0pt; line-height: 107%; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                    </div>
                </div>
            </div>
        </div>
        </transition>
    </div>
@endsection
