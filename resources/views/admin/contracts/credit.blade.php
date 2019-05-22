@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <transition name="fade" appear>
        <div class="row justify-content-center ">
           <div class="col-md-9 width-for-print">
               <div class="jumbotron none-print mb-3 p-2">
                   <div class="d-flex justify-content-between">
                       <a href="{{ URL::previous() }}" ><i class="fas fa-arrow-left"></i> счета</a>
                       <a href="#" @click.prevent="printWindow"><i class="fas fa-print"></i> печать pdf</a>
                   </div>
               </div>
               <div class="card rounded-0">
                 <div class="card-body">
                     <p style="margin-top: .05pt; text-align: center; tab-stops: 306.95pt 348.55pt;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Кредитный договор № {{ $contract->id }}</span></p>
                     <p style="text-align: right; line-height: 150%; tab-stops: 306.95pt 348.55pt; margin: .05pt 0cm .0001pt 143.05pt;">{{ $contract->created_at->format('d.m.Y') ?? '' }}</p>
                     <p style="text-align: justify; text-indent: 36.0pt; line-height: 115%; margin: .05pt 0cm .0001pt 0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">ПУБЛИЧНОЕ АКЦИОНЕРНОЕ ОБЩЕСТВО &laquo;</span><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">PocketMoney</span><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">&raquo; именуемое в дальнейшем &laquo;Кредитор&raquo;, с одной стороны, и {{ $contract->account->client->surname }} {{ $contract->account->client->name }} {{ $contract->account->client->patronymic }} (ФИО) именуемый в дальнейшем &laquo;Заемщик&raquo;, с другой стороны, заключили настоящий Договор о нижеследующем:</span></p>
                     <ul>
                         <li style="list-style:none; text-align: center; text-indent: 0cm; line-height: 150%; margin: 12.0pt 0cm .0001pt 0cm;"><span style="font-size: 12.0pt; line-height: 150%; font-family: 'Times New Roman','serif';">1. ПРЕДМЕТ ДОГОВОРА</span></li>
                     </ul>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">1.1. Кредитор обязуется предоставить Заемщику кредит в сумме&nbsp; {{$contract->amount}} Руб.</span></p>
                     <p style="margin-top: .05pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 59.85pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">1.2. Кредит предоставляется на потребительские цели.</span></p>
                     <p style="margin-right: 11.75pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 61.3pt;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">1.3. Заемщик обязуется возвратить Кредитору полученный кредит и уплатить проценты за пользование им в размере, сроки и на условиях настоящего Договора.</span></p>
                     <ul start="2">
                         <li style="list-style: none; text-align: center; text-indent: 0cm; line-height: 150%; margin: 12.0pt 0cm .0001pt 0cm;"><span style="font-size: 12.0pt; line-height: 150%; font-family: 'Times New Roman','serif';">2. УСЛОВИЯ ПРЕДОСТАВЛЕНИЯ КРЕДИТА</span></li>
                     </ul>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">2.1. Кредит предоставляется Заемщику на условиях срочности, платности, возвратности и обеспеченности.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">2.2. При наличии всех необходимых документов Кредитор открывает Заемщику ссудный счет.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">2.3. Срок &nbsp;пользования &nbsp;кредитом &nbsp;устанавливается &nbsp;от &nbsp;даты &nbsp;выдачи &nbsp;кредита и по дата (включительно). Под датой выдачи кредита в настоящем Договоре понимается дата отражения Кредитором суммы кредита на ссудном счете.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">2.4. Кредит предоставляется единовременно путем выдачи наличных денежных средств через кассу Кредитора или перечислением денежных средств на текущий счет Заемщика в другом банке при следующих условиях:</span></p>
                     <p style="margin-left: 53.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- внесения Заемщиком комиссии за выдачу кредита в размере, оговоренном в п.2.5 Договора;</span></p>
                     <p style="margin-left: 53.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- надлежащего оформления договоров обеспечения исполнения обязательств по настоящему Договору согласно п.5.1 Договора.</span></p>
                     <ul start="3">
                         <li style="list-style: none; text-align: center; text-indent: 0cm; line-height: 150%; margin: 12.0pt 0cm .0001pt 0cm;"><span style="font-size: 12.0pt; line-height: 150%; font-family: 'Times New Roman','serif';">3. ПОРЯДОК ПОЛЬЗОВАНИЯ КРЕДИТОМ И ЕГО ВОЗВРАТА</span></li>
                     </ul>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">3.1. Возврат кредита осуществляется в соответствии с графиком погашения кредита, приведенным в Приложении № 1 к настоящему Договору (по окончании срока действия договора).</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">3.2. Погашение кредита, уплата процентов за пользование им и пени производятся наличными деньгами через кассу Кредитора и /или в безналичном порядке путем перечисления средств на корреспондентский счет Кредитора.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">3.3. Датой погашения задолженности по кредиту, уплаты процентов и пени считается дата поступления от Заемщика денежных средств на соответствующие счета Кредитора.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">3.4. Заемщик вправе в любое время по собственному усмотрению осуществить полное или частичное погашение суммы основного долга. Платежи, направленные Заемщиком на досрочное погашение кредита, засчитываются в счет ближайших по срокам платежей в погашение кредита, установленных в п.3.1 Договора.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">3.5. За&nbsp;&nbsp; пользование&nbsp;&nbsp; кредитом&nbsp;&nbsp; Заемщик&nbsp; &nbsp;уплачивает&nbsp; &nbsp;Кредитору percent процентов годовых, начисляемых на фактическую сумму задолженности по основному долгу, учитываемому на ссудном счете на начало каждого операционного дня. Отсчет срока для начисления процентов за пользование кредитом начинается со дня, следующего за днем образования задолженности по ссудному счету, и заканчивается датой окончательного погашения задолженности по ссудному счету (включительно). Начисление процентов производится исходя из фактической суммы задолженности, величины процентной ставки, расчетного периода и количества календарных дней в году (365 или 366 дней соответственно). Если срок погашения процентов приходится на нерабочий день (выходной или праздничный), погашение задолженности по процентам осуществляется в последний рабочий день, предшествующий ему, за текущий расчетный период.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">3.6. Погашение задолженности по Договору осуществляется в следующей очередности:</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">3.6.1. при соблюдении сроков кредитования:</span></p>
                     <p style="margin-left: 54.0pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">-</span> <span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">проценты за пользование кредитом;</span></p>
                     <p style="margin-left: 54.0pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- сумма основного долга;</span></p>
                     <p style="line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.6.2. в случае нарушения сроков возврата кредита, уплаты процентов:</span></p>
                     <p style="margin-left: 54.0pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- сумма неустойки;</span></p>
                     <p style="margin-left: 54.0pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- проценты, неуплаченные в срок;</span></p>
                     <p style="margin-left: 54.0pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- проценты, подлежащие уплате за текущий расчетный период;</span></p>
                     <p style="margin-left: 54.0pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- просроченная задолженность по основному долгу;</span></p>
                     <p style="margin-left: 54.0pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- </span><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">основной долг по кредиту.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">&nbsp;3.7. Кредитор имеет право в одностороннем порядке изменить очередность погашения Заемщиком обязательств по кредиту.</span></p>
                     <ul start="4">
                         <li style="list-style:none; text-align: center; text-indent: 0cm; line-height: 150%; margin: 12.0pt 0cm .0001pt 0cm;"><span style="font-size: 12.0pt; line-height: 150%; font-family: 'Times New Roman','serif';">4. ПРАВА И ОБЯЗАННОСТИ СТОРОН.</span></li>
                     </ul>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">&nbsp;4.1. Кредитор обязан:</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.1.1. Предоставить Заемщику сумму Кредита в течение 5 (Пяти) рабочих дней от даты подписания настоящего Договора.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.1.2. Предоставить Заемщику расчет эффективной процентной ставки (полной стоимости кредита) за пользование кредитом на момент выдачи и/или реструктуризации кредита (Приложение 2 к Договору).</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.1.3. По требованию Заемщика представить расчет процентов за пользование кредитом.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">&nbsp;4.2. Кредитор имеет право:</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.2.1. Отказаться от предоставления Заемщику кредита при наличии обстоятельств, очевидно свидетельствующих о том, что предоставленный Заемщику кредит не будет возвращен в срок, а также в случае непредставления Заемщиком документов, подтверждающих наличие обеспечения исполнения обязательств Заемщика по настоящему Договору.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.2.2. В период действия настоящего Договора осуществлять проверку финансового положения Заемщика, требуя представления Заемщиком необходимых для этого документов.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.2.3. Досрочно взыскать сумму задолженности, в том числе сумму кредита и сумму начисленных процентов, при наступлении любого из ниже перечисленных случаев:</span></p>
                     <p style="margin-left: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- возникновение обстоятельств, ставящих под угрозу своевременность возврата кредита;</span></p>
                     <p style="margin-left: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">неоднократное (более 2-х раз) нарушение Заемщиком любого положения настоящего Договора, в том числе нарушение Заемщиком установленного настоящим Договором срока возврата очередной части кредита и/или срока уплаты процентов за пользование кредитом;</span></p>
                     <p style="margin-left: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- угрозы утраты обеспечения, недостаточности обеспечения, ухудшения его условий по любым обстоятельствам (в том числе по обстоятельствам, не зависящим от Заемщика) или иных обстоятельств (нарушение надлежащего хранения Предмета залога и препятствие в доступе представителей Кредитора к нему в любое время по первому требованию Кредитора), затрудняющих или могущих затруднить преимущественное удовлетворение требований Кредитора;</span></p>
                     <p style="margin-left: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- при непредставлении Заемщиком документов в сроки, указанные в подпункте 4.3.4 настоящего Договора;</span></p>
                     <p style="margin-left: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- при ухудшении финансового положения Заемщика;</span></p>
                     <p style="margin-left: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">- нарушение Заемщиком иных условий настоящего Договора, ставящих под угрозу своевременный возврат кредита и уплату процентов за его пользование, а также при нарушении Заемщиком условий договоров, обеспечивающих исполнение его обязательств по настоящему Договору.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">При этом Кредитор направляет Заемщику письменное требование о досрочном погашении задолженности по настоящему Договору с указанием расчета суммы, подлежащей возврату на момент предъявления требования и срока уплаты.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">&nbsp;4.3. Заемщик обязан:</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.3.1. Возвратить кредит и уплатить проценты за его использование в размере и сроки, предусмотренные настоящим Договором.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.3.2. Использовать кредит на цели, указанные в п. 1.2 настоящего Договора.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.3.3. Представлять Кредитору по первому требованию необходимые документы и сведения, касающиеся финансового положения Заемщика в течение всего периода пользования кредитом.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.3.4. Представлять Справку о доходах по форме 2-НДФЛ или справку о доходах, заверенную организацией-работодателем, в срок не позднее 30 (Тридцати) рабочих дней от даты окончания очередного квартала.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.3.5. Незамедлительно извещать Кредитора обо всех обстоятельствах, способных повлиять на надлежащие исполнение Заемщиком обязательств по настоящему Договору, а также о изменении фамилии, имени, адреса регистрации, фактического адреса проживания, места работы (смены работодателя), платежных и иных реквизитов.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.3.6. В течение срока действия настоящего Договора информировать Кредитора о предъявлении к Заемщику материальных претензий со стороны третьих лиц.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">&nbsp;4.4. Заемщик имеет право:</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.4.1. Запрашивать у Кредитора выписки по ссудному счету и расчет процентов за пользование кредитом.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.4.2. Досрочно погасить кредит полностью или частично.</span></p>
                     <p style="margin-left: 35.45pt; text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">4.4.3. Заемщик не имеет права передавать (продавать) третьим лицам свое право на получение кредита, а также свои обязанности по Договору без предварительного письменного согласия Кредитора.</span></p>
                     <ul start="5">
                         <li style="list-style:none; text-align: center; text-indent: 0cm; line-height: 150%; margin: 12.0pt 0cm .0001pt 0cm;"><span style="font-size: 12.0pt; line-height: 150%; font-family: 'Times New Roman','serif';">5. ОБЕСПЕЧЕНИЕ ИСПОЛНЕНИЯ ОБЯЗАТЕЛЬСТВ</span></li>
                     </ul>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">5.1. Исполнение обязательств Заемщика по своевременному и полному возврату кредита, уплате процентов, начисленных за его &nbsp;использование, обеспечивается.</span></p>
                     <ul start="6">
                         <li style="list-style:none; text-align: center; text-indent: 0cm; line-height: 150%; margin: 12.0pt 0cm .0001pt 0cm;"><span style="font-size: 12.0pt; line-height: 150%; font-family: 'Times New Roman','serif';">6. ОТВЕТСТВЕННОСТЬ СТОРОН</span></li>
                     </ul>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">6.1. Стороны несут ответственность за неисполнение и/или ненадлежащее исполнение своих обязательств, принятых по настоящему Договору, в соответствии с действующим законодательством Российской Федерации и настоящим Договором.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">6.2. В случае непогашения или несвоевременного погашения Заемщиком суммы основного долга согласно Графику, приведенному в Приложении № 1 к Договору, Заемщик уплачивает Кредитору неустойку в размере 0,2% (ноля целых двух десятых) процента от суммы неисполненных обязательств за каждый календарный день просрочки.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">6.3. В случае невыполнения Заемщиком обязательств по уплате процентов или нарушении сроков уплаты процентов за пользование кредитом, установленных п. 3.6 Договора, Заемщик уплачивает Кредитору неустойку в размере 0,2 % (ноля целых двух десятых) процента от просроченной суммы за каждый календарный день просрочки.</span></p>
                     <p style="text-align: justify; text-indent: 35.45pt; line-height: 115%; tab-stops: 63.85pt 17.0cm;"><span style="font-size: 12.0pt; line-height: 115%; font-family: 'Times New Roman','serif';">6.4. Заемщик несет ответственность за достоверность всех сведений, предоставленных Кредитору для получения и использования кредита.</span></p>
                     <ul start="7">
                         <li style="margin-top: 12.0pt; text-align: center; line-height: 150%;list-style: none"><span style="font-size: 12.0pt; line-height: 150%; font-family: 'Times New Roman','serif';">7</span><span style="font-size: 12.0pt; line-height: 150%; font-family: 'Times New Roman','serif';">. АДРЕСА И РЕКВИЗИТЫ СТОРОН</span></li>
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
                                 <p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">Кем и когда выдан: {{ $contract->account->client->issued }} {{ $contract->account->client->dateOfIssues ? $contract->account->client->dateOfIssues->format('d.m.Y') : '' }}</span></p>
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
                     <p style="margin-left: 0cm; text-indent: 0cm;"><span style="font-family: 'Times New Roman','serif';">&nbsp;</span></p>
                 </div>
               </div>
           </div>
        </div>
        </transition>
    </div>
@endsection
