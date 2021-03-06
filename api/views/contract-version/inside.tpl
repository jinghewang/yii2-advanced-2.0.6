<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 rb-md-6"><h4>BTG-{$year}</h4></div>
        <div class="col-xs-6 col-sm-6 col-md-6 text-right rb-md-6"><h4>合同编号：<small>{$contract.contr_no}</small></h4></div>
    </div>
    <div class="row title">
        <div class="text-center"><h2>{$version.title}</h2></div>
    </div>
    <div class="row company">
        <div class="text-center"><h3>{$provider.name}</h3></div>
    </div>
    {$PAGE_BREAK}
    <div class="row desctitle">
        <div class="text-center"><h3>使用说明</h3></div>
    </div>
    <div class="row desc">
        <ol>
            <li>本合同为示范文本，供中华人民共和国境内（不含港、澳、台地区）旅行社与旅游者之间签订境内包价旅游合同时使用（不含赴港、澳、台地区旅游及边境游）。</li>
            <li>双方当事人应当结合具体情况选择本合同协议条款中所提供的选择项，空格处应当以文字形式填写完整。</li>
            <li>双方当事人可以书面形式对本示范文本内容予以变更或者补充，但变更或者补充的内容，不得减轻或者免除应当由旅行社承担的责任。</li>
            <li>本合同依照国家旅游局和国家工商行政管理总局示范文本制定。</li>
        </ol>
    </div>
    {$PAGE_BREAK}
    <div class="row">
        <div class="text-center"><h2>{$version.title}</h2></div>
        <div>
            <p>
                旅游者：<u>{$assigned.name}</u>等<u>{count($travellers)}</u>人（名单可附页，需旅行社和旅游者代表签字盖章确认）；
            </p>
            <p>
                旅行社：<u>{$provider.name}</u>
            </p>
            <p>
                旅行社业务经营许可证编号：<u>{$provider.license}</u>
            </p>
        </div>
    </div>

    <!--术语定义-->
    <div class="row">
        <div class="text-center font-heiti"><strong>第一章&emsp;术语和定义</strong></div>
        <div>
            <p>第一条&emsp;本合同术语和定义</p>
            <ol>
                <li>境内旅游服务，指旅行社依据《中华人民共和国旅游法》、《旅行社条例》等法律、法规，组织旅游者在中华人民共和国境内（不含香港、澳门、台湾地区）旅游，代订公共交通客票，提供餐饮、住宿、游览等两项以上服务活动。</li>
                <li>旅游费用，指旅游者支付给旅行社，用于购买本合同约定的旅游服务的费用。</li>
                <p>旅游费用包括：</p>
                <ol class="list-none">
                    <li>（1）必要的签证/签注费用（旅游者自办的除外）；</li>
                    <li>（2）交通费（含境外机场税）；</li>
                    <li>（3）住宿费；</li>
                    <li>（4）餐费（不含酒水费）；</li>
                    <li>（5）旅行社统一安排的景区景点的门票费；</li>
                    <li>（6）行程中安排的其他项目费用；</li>
                    <li>（7）导游服务费；</li>
                </ol>
                <p>旅游费用不包括：</p>
                <ol class="list-none">
                    <li>（1）旅游者投保的人身意外伤害保险费用；</li>
                    <li>（2）合同未约定由旅行社支付的费用，包括但不限于行程以外非合同约定项目所需的费用、自行安排活动期间发生的费用；</li>
                    <li>（3）行程中发生的旅游者个人费用，包括但不限于交通工具上的非免费餐饮费、行李超重费，住宿期间的洗衣、通讯 、饮料及酒类费用，个人娱乐费用，个人伤病医疗费，寻找个人遗失物品的费用及报酬，个人原因造成的赔偿费用。</li>
                </ol>
                <li>履行辅助人，指与旅行社存在合同关系，协助其履行本合同义务，实际提供相关服务的法人、自然人或者其他组织。</li>
                <li>自由活动，特指《旅游行程单》中安排的自由活动。</li>
                <li>自行安排活动期间，指《旅游行程单》中安排的自由活动期间、旅游者不参加旅游行程活动期间、每日行程开始前、结束后旅游者离开住宿设施的个人活动期间、旅游者经领队或者导游同意暂时离团的个人活动期间。</li>
                <li>不合理的低价，指旅行社提供服务的价格低于接待和服务费用或者低于行业公认的合理价格，且无正当理由和充分证据证明该价格的合理性。其中，接待和服务费用主要包括旅行社提供或者采购餐饮、住宿、交通、游览、导游等服务所支出的费用。</li>
                <li>具体购物场所，指购物场所有独立的商号以及相对清晰、封闭、独立的经营边界和明确的经营主体，包括免税店，大型购物商场，前店后厂的购物场所，景区内购物场所，景区周边或者通往景区途中的购物场所，服务旅游团队的专门商店，商品批发市场和与餐饮、娱乐、停车休息等相关联的购物场所等。</li>
                <li>旅游者投保的人身意外伤害保险，指旅游者自己购买或者通过旅行社、航空机票代理点、景区等保险代理机构购买的以旅行期间自身的生命、身体或者有关利益为保险标的的短期保险，包括但不限于航空意外险、旅游意外险、紧急救援保险、特殊项目意外险。</li>
                <li>离团，指团队旅游者经导游同意不随团队完成约定行程的行为。</li>
                <li>脱团，指团队旅游者未经导游同意脱离旅游团队，不随团队完成约定行程的行为。</li>
                <li>转团，指由于未达到约定成团人数不能出团，旅行社征得旅游者书面同意，在行程开始前将旅游者转至其他旅行社所组的境内旅游团队履行合同的行为。</li>
                <li>拼团，指旅行社在保证所承诺的服务内容和标准不变的前提下，在签订合同时经旅游者同意，与其他旅行社招徕的旅游者拼成一个团统一安排旅游服务的行为。</li>
                <li>不可抗力，指不能预见、不能避免并不能克服的客观情况，包括但不限于因自然原因和社会原因引起的，如自然灾害、战争、恐怖活动、动乱、骚乱、罢工、突发公共卫生事件、政府行为。</li>
                <li>已尽合理注意义务仍不能避免的事件，指因当事人故意或者过失以外的客观因素引发的事件，包括但不限于重大礼宾活动导致的交通堵塞，飞机、火车、班轮、城际客运班车等公共客运交通工具延误或者取消，景点临时不开放。</li>
                <li>必要的费用，指旅行社履行合同已经发生的费用以及向地接社或者履行辅助人支付且不可退还的费用, 包括乘坐飞机（车、船）等交通工具的费用（含预订金）、旅游签证/签注费用、饭店住宿费用（含预订金）、旅游观光汽车的人均车租等。</li>
                <li>公共交通经营者，指航空、铁路、航运客轮、城市公交、地铁等公共交通工具经营者。</li>
            </ol>
        </div>
    </div>

    <!--合同的订立-->
    <div class="row">
        <div class="text-center font-heiti"><strong>第二章&emsp;合同的订立</strong></div>
        <div>
            <p>第二条&emsp;旅游行程单</p>
            <p>旅行社应当提供带团号的《旅游行程单》（以下简称《行程单》），经双方签字或者盖章确认后作为本合同的组成部分。《行程单》应当对如下内容作出明确的说明：</p>
            <ol class="list-none">
                <li>（1）旅游行程的出发地、途经地、目的地、结束地，线路行程时间（按自然日计算，含乘飞机、车、船等在途时间，不足24小时以一日计）</li>
                <li>（2）旅游目的地地接社的名称、联系人和联系电话；</li>
                <li>（3）交通服务安排及其标准（明确交通工具及档次等级、出发时间以及是否需中转等信息）；</li>
                <li>（4）住宿服务安排及其标准（明确住宿饭店的名称、地址、档次等级及是否有空调、热水等相关服务设施）；</li>
                <li>（5）用餐（早餐和正餐）服务安排及其标准（明确用餐次数、地点、标准）；</li>
                <li>（6）旅行社统一安排的游览项目的具体内容及时间（明确旅游线路内容包括景区点及游览项目名称、景区点停留的最少时间）；</li>
                <li>（7）自由活动的时间；</li>
                <li>（8）行程安排的娱乐活动（明确娱乐活动的时间、地点和项目内容）；</li>
            </ol>
            <p>《行程单》用语须准确清晰，在表明服务标准用语中不应当出现“准×星级”、“豪华”、“仅供参考”、“以××为准”、“与××同级”等不确定用语。</p>
        </div>
        <div>
            <p>第三条&emsp;订立合同</p>
            <p>旅游者应当认真阅读本合同条款和《行程单》，在旅游者理解本合同条款及有关附件后，旅行社和旅游者应当签订书面合同。</p>
            <p>由旅游者的代理人订立合同的，代理人需要出具被代理的旅游者的授权委托书或按照特别约定执行。</p>
        </div>
        <div>
            <p>第四条&emsp;旅游广告及宣传品</p>
            <p>旅行社的旅游广告及宣传品应当遵循诚实信用的原则，其内容符合《中华人民共和国合同法》要约规定的，视为本合同的组成部分，对旅行社和旅游者双方具有约束力。</p>
        </div>
    </div>

    <!--合同双方的权利义务-->
    <div class="row">
        <div class="text-center font-heiti"><strong>第三章&emsp;合同双方的权利义务</strong></div>
        <div>
            <p>第五条&emsp;旅行社的权利</p>
            <ol>
                <li>根据旅游者的身体健康状况及相关条件决定是否接纳旅游者报名参团；</li>
                <li>核实旅游者提供的相关信息资料；</li>
                <li>按照合同约定向旅游者收取全额旅游费用；</li>
                <li>旅游团队遇紧急情况时，可以采取安全防范措施和紧急避险措施并要求旅游者配合；</li>
                <li>拒绝旅游者提出的超出合同约定的不合理要求；</li>
                <li>要求旅游者对在旅游活动中或者在解决纠纷时损害旅行社合法权益的行为承担赔偿责任；</li>
                <li>要求旅游者健康、文明旅游，劝阻旅游者违法和违反社会公德的行为。</li>
            </ol>
        </div>
        <div>
            <p>第六条&emsp;旅行社的义务</p>
            <ol>
                <li>按照合同和《行程单》约定的内容和标准为旅游者提供服务，不擅自变更旅游行程安排，不降低服务标准；</li>
                <li>向合格的供应商订购产品和服务；</li>
                <li>不以不合理的低价组织旅游活动，诱骗旅游者，并通过安排购物或者另行付费旅游项目获取回扣等不正当利益；组织、接待旅游者，不指定具体购物场所，不安排另行付费旅游项目，但是，经双方协商一致或者旅游者要求，且不影响其他旅游者行程安排的除外；</li>
                <li>在出团前如实告知具体行程安排和有关具体事项。具体事项包括但不限于所到旅游目的地的重要规定、风俗习惯；旅游活动中的安全注意事项和安全避险措施、旅游者不适合参加旅游活动的情形；旅行社依法可以减免责任的信息；应急联络方式以及法律、法规规定的其他应当告知的事项</li>
                <li>按照合同约定，为旅游团队安排符合《中华人民共和国旅游法》、《导游人员管理条例》规定的持证导游人员；</li>
                <li>妥善保管旅游者交其代管的证件、行李等物品；</li>
                <li>为旅游者发放用固定格式书写、由旅游者填写的安全信息卡（内容包括旅游者的姓名、血型、应急联络方式等）；</li>
                <li>旅游者人身、财产权益受到损害时，应采取合理必要的保护和救助措施，避免旅游者人身、财产权益损失扩大；</li>
                <li>积极协调处理旅游行程中的纠纷，采取适当措施防止损失扩大；</li>
                <li>提示旅游者按照规定投保人身意外伤害保险；</li>
                <li>向旅游者提供发票；</li>
                <li>依法对旅游者个人信息保密。</li>
                <li>旅游行程中解除合同的，旅行社应当协助旅游者返回出发地或者旅游者指定的合理地点。</li>
            </ol>
        </div>
        <div>
            <p>第七条&emsp;旅游者的权利</p>
            <ol>
                <li>要求旅行社按照合同及《行程单》约定履行相关义务；</li>
                <li>拒绝未经事先协商一致的转团、拼团行为；</li>
                <li>有权自主选择旅游产品和服务，有权拒绝旅行社未与旅游者协商一致或者未经旅游者要求而指定购物场所、安排旅游者参加另行付费旅游项目的行为，有权拒绝旅行社的导游强迫或者变相强迫旅游者购物、参加另行付费旅游项目的行为；</li>
                <li>在支付旅游费用时要求旅行社出具发票；</li>
                <li>人格尊严、民族风俗习惯和宗教信仰得到尊重；</li>
                <li>在人身、财产安全遇有危险时，有权请求救助和保护；人身、财产受到侵害的，有权依法获得赔偿；</li>
                <li>在合法权益受到损害时向有关部门投诉或者要求旅行社协助索赔；</li>
                <li>《中华人民共和国旅游法》、《中华人民共和国消费者权益保护法》和有关法律、法规赋予旅游者的其他各项权利。</li>
            </ol>
        </div>
        <div>
            <p>第八条&emsp;旅游者的义务</p>
            <ol>
                <li>如实填写《旅行旅游报名表》、游客安全信息卡等各项内容，告知与旅游活动相关的个人健康信息，并对其真实性负责，保证所提供的联系方式准确无误且能及时联系；</li>
                <li>按照合同约定支付旅游费用；</li>
                <li>遵守法律、法规和有关规定，不在旅游行程中从事违法活动，不参与色情、赌博和涉毒活动；</li>
                <li>遵守公共秩序和社会公德，尊重旅游目的地的风俗习惯，文化传统和宗教信仰，爱护旅游资源，保护生态环境，遵守《中国公民国内旅游文明行为指南》等文明行为规范；</li>
                <li>对国家应对重大突发事件暂时限制旅游活动的措施以及有关部门、机构或者旅游经营者采取的安全防范和应急处置措施予以配合；</li>
                <li>妥善保管自己的行李物品，随身携带现金、有价证券、贵重物品，不在行李中夹带；</li>
                <li>在旅游活动中或者在解决纠纷时，应采取适当措施防止损失扩大，不损害当地居民的合法权益，不干扰他人的旅游活动，不损害旅游经营者和旅游从业人员的合法权益，不采取拒绝上、下机（车、船）、拖延行程或者脱团等不当行为；</li>
                <li>在自行安排活动期间，应当在自己能够控制风险的范围内选择活动项目，遵守旅游活动中的安全警示规定，对自己的安全负责。</li>
            </ol>
        </div>
    </div>

    <!--合同的变更与转让-->
    <div class="row">
        <div class="text-center font-heiti"><strong>第四章&emsp;合同的变更与转让</strong></div>
        <div>
            <p>第九条&emsp;合同的变更</p>
            <ol>
                <li>旅行社与旅游者双方协商一致，可以变更本合同约定的内容，但应当以书面形式由双方签字确认。由此增加的旅游费用及给对方造成的损失，由变更提出方承担；由此减少的旅游费用，旅行社应当退还旅游者。</li>
                <li>行程开始前遇到不可抗力或者旅行社、履行辅助人已尽合理注意义务仍不能避免的事件的，双方经协商可以取消行程或者延期出行。取消行程的，按照本合同第十四条处理；延期出行的，增加的费用由旅游者承担，减少的费用退还旅游者。</li>
                <li>行程中遇到不可抗力或者旅行社、履行辅助人已尽合理注意义务仍不能避免的事件，影响旅游行程的，按以下方式处理：</li>
                <ol class="list-none">
                    <li>（1）合同不能完全履行的，旅行社经向旅游者作出说明，旅游者同意变更的，可以在合理范围内变更合同，因此增加的费用由旅游者承担，减少的费用退还旅游者。</li>
                    <li>（2）危及旅游者人身、财产安全的，旅行社应当采取相应的安全措施，因此支出的费用，由旅行社与旅游者分担。</li>
                    <li>（3）造成旅游者滞留的，旅行社应采取相应的安置措施。因此增加的食宿费用由旅游者承担，增加的返程费用双方分担。</li>
                </ol>
            </ol>
        </div>
        <div>
            <p>第十条&emsp;合同的转让</p>
            <p>旅游行程开始前，旅游者可以将本合同中自身的权利义务转让给第三人，旅行社没有正当理由的不得拒绝，并办理相关转让手续，因此增加的费用由旅游者和第三人承担。</p>
            <p>正当理由包括但不限于：对应原报名者办理的相关服务不可转让给第三人的；无法为第三人安排交通等情形的；旅游活动对于旅游者的身份、资格等有特殊要求的。</p>
        </div>
        <div>
            <p>第十一条&emsp;不成团的安排</p>
            <p>当未达到约定的成团人数不能成团时，旅游者可以与旅行社就如下安排在本合同第二十三条中做出约定。</p>
            <ol>
                <li>.转团：旅行社可以在保证所承诺的服务内容和标准不降低的前提下，经事先征得旅游者书面同意，委托其他旅行社履行合同，并就受委托出团的旅行社违反本合同约定的行为先行承担责任，再行追偿。旅游者和受委托出团的旅行社另行签订合同的，本合同的权利义务终止。</li>
                <li>延期出团或者改变线路出团：旅行社经征得旅游者书面同意，可以延期出团或者改变其他线路出团，因此增加的费用由旅游者承担，减少的费用旅行社予以退还。需要时可以重新签订旅游合同。</li>
            </ol>
        </div>
    </div>

    <!--合同的解除-->
    <div class="row">
        <div class="text-center font-heiti"><strong>第五章&emsp;合同的解除</strong></div>
        <div>
            <p>第十二条&emsp;旅行社解除合同</p>
            <ol>
                <li>未达到约定的成团人数不能成团时，旅行社解除合同的，应当采取书面等有效形式。旅行社在行程开始前7日（按照出发日减去解除合同通知到达日的自然日之差计算，下同）以上（含第7日，下同）提出解除合同的，不承担违约责任，旅行社向旅游者退还已收取的全部旅游费用；旅行社在行程开始前7日以内（不含第7日，下同）提出解除合同的，除向旅游者退还已收取的全部旅游费用外，还应当按照本合同第十七条第1款的约定承担相应的违约责任。</li>
                <li>旅游者有下列情形之一的，旅行社可以解除合同（相关法律、行政法规另有规定的除外）：</li>
                <ol class="list-none">
                    <li>（1）患有传染病等疾病，可能危害其他旅游者健康和安全的；</li>
                    <li>（2）携带危害公共安全的物品且不同意交有关部门处理的；</li>
                    <li>（3）从事违法或者违反社会公德的活动的；</li>
                    <li>（4）从事严重影响其他旅游者权益的活动，且不听劝阻、不能制止的；</li>
                    <li>（5）法律、法规规定的其他情形。</li>
                </ol>
                <p>旅行社因上述情形解除合同的，应当以书面等形式通知旅游者，按照本合同第十五条的相关约定扣除必要的费用后，将余款退还旅游者。</p>
            </ol>
        </div>
        <div>
            <p>第十三条&emsp;旅游者解除合同</p>
            <ol>
                <li>未达到约定的成团人数不能成团时，旅游者既不同意转团，也不同意延期出行或者改变其他线路出团的，旅行社应及时发出不能成团的书面通知，旅游者可以解除合同。旅游者在行程开始前7日以上收到旅行社不能成团通知的，旅行社不承担违约责任，向旅游者退还已收取的全部旅游费用；旅游者在行程开始前7日以内收到旅行社不能成团通知的，按照本合同第十七条第1款相关约定处理。</li>
                <li>除本条第1款约定外，在行程结束前，旅游者亦可以书面等形式解除合同（相关法律、行政法规另有规定的除外）。旅游者在行程开始前7日以上提出解除合同的，旅行社应当向旅游者退还全部旅游费用；旅游者在行程开始前7日以内提出解除合同的，旅行社按照本合同第十五条相关约定扣除必要的费用后，将余款退还旅游者。</li>
                <li>旅游者未按约定时间到达约定集合出发地点，也未能在出发中途加入旅游团队的，视为旅游者解除合同，按照本合同第十五条相关约定处理。</li>
            </ol>
        </div>
        <div>
            <p>第十四条&emsp;因不可抗力或者已尽合理注意义务仍不能避免的事件解除合同</p>
            <p>因不可抗力或者旅行社、履行辅助人已尽合理注意义务仍不能避免的事件，影响旅游行程，合同不能继续履行的，旅行社和旅游者均可以解除合同；合同不能完全履行，旅游者不同意变更的，可以解除合同（因已尽合理注意义务仍不能避免的事件提出解除合同的，相关法律、行政法规另有规定的除外）。</p>
            <p>合同解除的，旅行社应当在扣除已向地接社或者履行辅助人支付且不可退还的费用后，将余款退还旅游者。</p>
        </div>
        <div>
            <p>第十五条&emsp;必要的费用扣除</p>
            <ol>
                <li>旅游者在行程开始前7日以内提出解除合同或者按照本合同第十二条第2款约定由旅行社在行程开始前解除合同的，按下列标准扣除必要的费用：</li>
                <p>行程开始前6日至4日，按旅游费用总额的20%；</p>
                <p>行程开始前3日至1日，按旅游费用总额的40%；</p>
                <p>行程开始当日，按旅游费用总额的60%。</p>
                <li>在行程中解除合同的，必要的费用扣除标准为：</li>
                <p>旅游费用×行程开始当日扣除比例+（旅游费用-旅游费用×行程开始当日扣除比例)÷旅游天数×已经出游的天数。</p>
                <p>如按上述第1款或者第2款约定比例扣除的必要的费用低于实际发生的费用，旅游者按照实际发生的费用支付，但最高额不应当超过旅游费用总额。</p>
                <p>解除合同的，旅行社扣除必要的费用后，应当在解除合同通知到达日起5个工作日内为旅游者办结退款手续。</p>
            </ol>
        </div>
        <div>
            <p>第十六条&emsp;旅行社协助旅游者返程及费用承担</p>
            <p>旅游行程中解除合同的，旅行社应协助旅游者返回出发地或者旅游者指定的合理地点。因旅行社或者履行辅助人的原因导致合同解除的，返程费用由旅行社承担；行程中按照本合同第十二条第2款，第十三条第2款约定解除合同的，返程费用由旅游者承担；按照本合同第十四条约定解除合同的，返程费用由双方分担。</p>
        </div>
    </div>

    <!--第六章  违约责任-->
    <div class="row">
        <div class="text-center font-heiti"><strong>第六章&emsp;违约责任</strong></div>
        <div>
            <p>第十七条&emsp;旅行社的违约责任</p>
            <ol>
                <li>旅行社在行程开始前7日以内提出解除合同的，或者旅游者在行程开始前7日以内收到旅行社不能成团通知，不同意转团、延期出行和改变线路解除合同的，旅行社向旅游者退还已收取的全部旅游费用，并按下列标准向旅游者支付违约金：</li>
                <p>行程开始前6日至4日，支付旅游费用总额10%的违约金；</p>
                <p>行程开始前3日至1日，支付旅游费用总额15%的违约金；</p>
                <p>行程开始当日，支付旅游费用总额20%的违约金。</p>
                <p>如按上述比例支付的违约金不足以赔偿旅游者的实际损失，旅行社应当按实际损失对旅游者予以赔偿。</p>
                <p>旅行社应当在取消出团通知或者旅游者不同意不成团安排的解除合同通知到达日起5个工作日内，为旅游者办结退还全部旅游费用的手续并支付上述违约金。</p>
                <li>旅行社未按合同约定提供服务，或者未经旅游者同意调整旅游行程（本合同第九条第3款规定的情形除外），造成项目减少、旅游时间缩短或者标准降低的，应当依法承担继续履行、采取补救措施或者赔偿损失等违约责任。</li>
                <li>旅行社具备履行条件，经旅游者要求仍拒绝履行本合同义务的，旅行社向旅游者支付旅游费用总额30%的违约金，旅游者采取订同等级别的住宿、用餐、交通等补救措施的，费用由旅行社承担；造成旅游者人身损害、滞留等严重后果的，旅游者还可以要求旅行社支付旅游费用一倍以上三倍以下的赔偿金。</li>
                <li>未经旅游者同意，旅行社转团、拼团的，旅行社应向旅游者支付旅游费用总额25%的违约金；旅游者解除合同的，旅行社还应向未随团出行的旅游者退还全部旅游费用，向已随团出行的旅游者退还尚未发生的旅游费用。如违约金不足以赔偿旅游者的实际损失，旅行社应当按实际损失对旅游者予以赔偿。</li>
                <li>行社有以下情形之一的，旅游者有权在旅游行程结束后30日内，要求旅行社为其办理退货并先行垫付退货货款，或者退还另行付费旅游项目的费用：</li>
                <ol class="list-none">
                    <li>（1）旅行社以不合理的低价组织旅游活动，诱骗旅游者，并通过安排购物或者另行付费旅游项目获取回扣等不正当利益的；</li>
                    <li>（2）未经双方协商一致或者未经旅游者要求，旅行社指定具体购物场所或者安排另行付费旅游项目的。</li>
                </ol>
                <li>与旅游者出现纠纷时，旅行社应当积极采取措施防止损失扩大，否则应当就扩大的损失承担责任。</li>
            </ol>
        </div>
        <div>
            <p>第十八条&emsp;旅游者的违约责任</p>
            <ol>
                <li>因不听从旅行社及其导游的劝告、提示而影响团队行程，给旅行社造成损失的，应当承担相应的赔偿责任。</li>
                <li>旅游者超出本合同约定的内容进行个人活动所造成的损失，由其自行承担。</li>
                <li>由于旅游者的过错，使旅行社、履行辅助人、旅游从业人员或者其他旅游者遭受损害的，应当由旅游者赔偿损失。</li>
                <li>旅游者在旅游活动中或者在解决纠纷时，应采取措施防止损失扩大，否则应当就扩大的损失承担相应的责任。</li>
                <li>旅游者违反安全警示规定，或者对国家应对重大突发事件暂时限制旅游活动的措施、安全防范和应急处置措施不予配合，造成旅行社损失的，应当依法承担相应责任。</li>
            </ol>
        </div>
        <div>
            <p>第十九条&emsp;其他责任</p>
            <ol>
                <li>由于旅游者自身原因导致本合同不能履行或者不能按照约定履行，或者造成旅游者人身损害、财产损失的，旅行社不承担责任。</li>
                <li>旅游者自行安排活动期间人身、财产权益受到损害的，旅行社在事前已尽到必要警示说明义务且事后已尽到必要救助义务的，旅行社不承担赔偿责任。</li>
                <li>由于第三方侵害等不可归责于旅行社的原因导致旅游者人身、财产权益受到损害的，旅行社不承担赔偿责任。但因旅行社不履行协助义务致使旅游者人身、财产权益损失扩大的，应当就扩大的损失承担赔偿责任。</li>
                <li>由于公共交通经营者的原因造成旅游者人身损害、财产损失依法应承担责任的，旅行社应当协助旅游者向公共交通经营者索赔。</li>
            </ol>
        </div>
    </div>

    {$PAGE_BREAK}
    <!--协议条款-->
    <div class="row">
        <div class="text-center font-heiti"><strong>第七章&emsp;协议条款</strong></div>
        <div>
            <p>第二十条&emsp;线路行程时间</p>
            <p>线路名称及编号：<u>&emsp;{$group.linename}&emsp;</u></p>
            <p>出发时间：<u>&emsp;{$group.bgndate|date_format:"%Y"}&emsp;</u>年<u>&emsp;{$group.bgndate|date_format:"%m"}&emsp;</u>月<u>&emsp;{$group.bgndate|date_format:"%e"}&emsp;</u>日，</p>
            <p>结束时间：<u>&emsp;{$group.enddate|date_format:"%Y"}&emsp;</u>年<u>&emsp;{$group.enddate|date_format:"%m"}&emsp;</u>月<u>&emsp;{$group.enddate|date_format:"%e"}&emsp;</u>日；</p>
            <p>共<u>&emsp;{$group.days}&emsp;</u>天，饭店住宿<u>&emsp;{$group.nights}&emsp;</u>夜。</p>
        </div>
        <div>
            <p>第二十一条&emsp;旅游费用及支付（以人民币为计算单位）</p>
            <p>成人<u>&emsp;{$pay.numAdult}&emsp;</u>人、成人<u>&emsp;{$pay.payEachAdult}&emsp;</u>元/人、儿童（不满12岁）<u>&emsp;{$pay.numChild}&emsp;</u>人、儿童<u>&emsp;{$pay.payEachChild}&emsp;</u>元/人；</p>
            <p>旅游费用合计 ：<u>&emsp;{$pay.payTravel}&emsp;</u>元。</p>
            <p>旅游费用支付方式 ：<u>&emsp;{hlt_enum type="payType" value=$pay.payType}&emsp;</u></p>
            <p>旅游费用支付时间 ：<u>&emsp;{$pay.payDeadline}&emsp;</u></p>
        </div>
        <div>
            <p>第二十二条&emsp;人身意外伤害保险</p>
            <ol>
                <li>旅行社提示旅游者购买人身意外伤害保险；</li>
                <li>旅游者可以做以下选择：</li>
                <ol class="list-unstyled">
                    <li>{hlt_checkbox value=$insurance.purchases}委托旅行社购买 （旅行社不具有保险兼业代理资格的，不得勾选此项）：</li>
                    <li>保险产品名称<u>&emsp;{$insurance.insurance}&emsp;</u>投保的相关信息以实际保单为准）；</li>
                    <li>{hlt_checkbox value=$insurance.purchases cmp=2}自行购买；</li>
                    <li>{hlt_checkbox value=$insurance.purchases cmp=3}放弃购买。</li>
                </ol>
            </ol>
        </div>
        <div class="">
            <p>第二十三条&emsp;成团人数与不成团的约定</p>
            <ol class="list-unstyled">
                <li>成团的最低人数：<u>&emsp;{$group.personLimit}&emsp;</u>人。</li>
                <li>如不能成团，旅游者是否同意按下列方式解决：</li>
                <ol>
                    <li><u>&emsp;{hlt_result value=$otherGroup.transAgree}&emsp;</u>（同意或者不同意，打勾无效）旅行社委托<u>&emsp;{$otherGroup.transAgency}</u>旅行社履行合同；</li>
                    <li><u>&emsp;{hlt_result value=$otherGroup.delayAgree}&emsp;</u>（同意或者不同意，打勾无效）延期出团；</li>
                    <li><u>&emsp;{hlt_result value=$otherGroup.changeLineAgree}&emsp;</u>（同意或者不同意，打勾无效）改签其他线路出团；</li>
                    <li><u>&emsp;{hlt_result value=$otherGroup.terminateAgree}&emsp;</u>同意或者不同意，打勾无效）解除合同。</li>
                </ol>
            </ol>
        </div>
        <div>
            <p>第二十四条&emsp;拼团约定</p>
            <ol class="list-unstyled">
                <li>旅游者<u>&emsp;{hlt_result value=$otherGroup.mergeAgree}&emsp;</u>（同意或者不同意，打勾无效）采用拼团方式出团。</li>
                <li>委托/接待社名称：<u>&emsp;{$otherGroup.mergeAgency}&emsp;</u></li>
            </ol>
        </div>
        <div>
            <p>第二十五条&emsp;自愿购物和参加另行付费旅游项目约定</p>
            <ol>
                <li>旅游者可以自主决定是否参加旅行社安排的购物活动、另行付费旅游项目；</li>
                <li>旅行社可以在不以不合理的低价组织旅游活动、不诱骗旅游者、不获取回扣等不正当利益，且不影响其他旅游者行程安排的前提下，按照平等自愿、诚实信用的原则，与旅游者协商一致达成购物活动、另行付费旅游项目协议；</li>
                <li>购物活动、另行付费旅游项目安排应不与《行程单》冲突；</li>
                <li>地接社及其从业人员在行程中安排购物活动、另行付费旅游项目的，责任由订立本合同的旅行社承担；</li>
                <li>行程安排之外的购物活动、另行付费旅游项目双方需签订《自愿购物活动补充协议》、《自愿参加另行付费旅游项目补充协议》。</li>
            </ol>
        </div>
        {$PAGE_BREAK}
        <div class="">
            <p>第二十六条&emsp;争议的解决方式</p>
            <p>本合同履行过程中发生争议，由双方协商解决，亦可向合同签订地的旅游质监执法机构、消费者协会、有关的调解组织等有关部门或者机构申请调解。协商或者调解不成的，依法向<u>北京市朝阳区人民法院</u>起诉。</p>
        </div>
        <div>
            <p>第二十七条&emsp;其他约定事项</p>
            <p>未尽事宜，经旅游者和旅行社双方协商一致，可以列入补充条款。（如合同空间不够，可以另附纸张，由双方签字或者盖章确认。）</p>
            <ol>
                <li>关于安全保障卡：您已领取<u>&emsp;{$travellers|count}</u>人安全保障卡，请确保每人准确填写、随身携带；</li>
                <li>关于代理签合同：本人承诺全权代表<u>&emsp;{$assigned.name}</u>等<u>&emsp;{$travellers|count}</u>人签订本合同，履行相应义务，承担相应责任；</li>
                <li>关于预定预付费用：<u>&emsp;</u> </li>
                <li>关于酒店、机票的特别约定：<u style="color: #ff0000">因机票为团队机票，酒店需提前预定，双方一经确认，机票、酒店费用将实际发生。如因甲方退团或变更，所产生的机票、酒店费用，由甲方承担。</u></li>
                <li>关于出团通知：发放时间及方式：<u>&emsp;</u>  </li>
                <li>其它特别约定：<u>{$other.other}&emsp;</u></li>
            </ol>
        </div>
        <div>
            <p>第二十八条&emsp;合同效力</p>
            <p>本合同一式贰份，双方各持壹份，具有同等法律效力，自双方当事人签字或者盖章之日起生效。</p>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    旅游者（或代表）签字（盖章）：{$assigned.name}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    旅行社盖章：{$groupcorp.corp}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    证件号码：{$assigned.idcode}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    签约代表签字（盖章）：{$groupcorp.sign}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    住&emsp;&emsp;址：{$assigned.addr}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    营业地址：{$groupcorp.addr}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    联系电话：{$assigned.mobile}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    联系电话：{$groupcorp.tel}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    传&emsp;&emsp;真：{$assigned.extra.fax}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    传&emsp;&emsp;真：{$groupcorp.fax}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    邮&emsp;&emsp;编：{$assigned.extra.zip}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    邮&emsp;&emsp;编：{$groupcorp.zip}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    电子信箱：{$assigned.extra.mail}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    电子信箱：{$groupcorp.mail}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    签约日期：{$contract.signTimeF}
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    签约日期：{$contract.signTimeF}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    签约地点：{$effect.addr}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col rb-md-6">
                    质量监督、投诉电话：<u> 4006276271 </u>
                </div>
            </div>
        </div>
        {$PAGE_BREAK}
        {*人员名单*}
        <div class="">
            <p class="file">附件1：</p>
            <div class="text-center font-heiti"><h3>旅行旅游报名表</h3></div>
            <p>旅游线路及编号：<u>&emsp;{$group.linename}({$group.teamcode})&emsp;</u>　　　出团时间:<u>&emsp;{$group.bgndate}&emsp;</p>
            <div class="table-responsive">
                <table class="table table-bordered rb-table-bordered">
                    <tr>
                        <td class="text-center rb-th" width="12%">序号</td>
                        <td class="text-center rb-th" width="8%">性别</td>
                        <td class="text-center rb-th" width="12%">年龄</td>
                        <td class="text-center rb-th" width="12%">国籍</td>
                        <td class="text-center rb-th" width="12%">旅行证件号</td>
                        <td class="text-center rb-th" width="12%">身份证号</td>
                        <td class="text-center rb-th" width="14%">本人联系电话</td>
                        <td class="text-center rb-th" width="10%">紧急联系电话</td>
                        <td class="text-center rb-th" width="8%">身体状况</td>
                    </tr>
                    <tbody>
                    {foreach from=$travellers key=num item="member"}
                        <tr>
                            <td class="text-center rb-td">{$num+1}</td>
                            <td class="text-center rb-td">{hlt_enum type="sex" value=$member.sex}&nbsp;</td>
                            <td class="text-center rb-td">{$member.birthday}&nbsp;</td>
                            <td class="text-center rb-td">{$member.nation}&nbsp;</td>
                            <td class="text-center rb-td">&nbsp;</td>
                            <td class="text-center rb-td">{$member.idcode}&nbsp;</td>
                            <td class="text-center rb-td">{$member.mobile}&nbsp;</td>
                            <td class="text-center rb-td">&nbsp;</td>
                            <td class="text-center rb-td">&nbsp;</td>
                        </tr>
                    {/foreach}
                    <tr>
                        <td style="vertical-align: middle; " class="text-center">备<br>&emsp;<br>&emsp;<br>&emsp;<br>注</td>
                        <td colspan="8" height="300">
                            <ol>
                                <li><u>&emsp;&emsp;</u>号与<u>&emsp;&emsp;</u> 号一间房；<u>&emsp;&emsp;</u> 号与<u>&emsp;&emsp;</u> 号一间房；<u>&emsp;&emsp;</u> 号与<u>&emsp;&emsp;</u> 号一间房；<u>&emsp;&emsp;</u> 号与<u>&emsp;&emsp;</u> 号一间房；
                                    号为单男/单女需要安排与他人同住，<u>&emsp;&emsp;</u> 号不占床位，<u>&emsp;&emsp;</u> 号全程单住（同意补交房费差额）；
                                </li>
                                <li>
                                    如您患有①身体残疾、②精神疾病、③高血压、④心脏病、⑤其他健康受损病症、病史、⑥妊娠期妇女等需要特别告知的疾病，请注明：<u>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</u>
                                </li>
                                <li>
                                    如为少数民族人士，请特殊注明：
                                </li>
                                <li>
                                    年龄小于18周岁，需要提交监护人书面同意出行书；
                                </li>
                                <li>
                                    若表格不够，请按照同等格式另附报名表；
                                </li>
                                <li>
                                    其他补充说明：<u>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</u>
                                </li>
                            </ol>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
             <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 rb-md-6">
                        旅游者(或代表)签字：{$assigned.name}
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right rb-md-6">
                        {date_now}
                    </div>
             </div>
        </div>
        {$PAGE_BREAK}
        {*团队行程*}
        <div class="">
            <p class="file">附件2：</p>
            <div class="text-center font-heiti"><h3>团队行程</h3></div>
            <table cellspacing="0" cellpadding="1" class="table table-bordered rb-table-bordered">
                <tbody>
                <tr class="ZTableTr">
                    <td style="width:12%">团号</td>
                    <td style="width:34%"><span>{$group.teamcode}</span></td>
                    <td style="width:12%">出团日期</td>
                    <td style="width:15%">{$group.bgndate}</td>
                    <td style="width:12%">返回日期</td>
                    <td style="width:15%">{$group.enddate}</td>
                </tr>
                <tr class="ZTableTr">
                    <td>线路名称</td>
                    <td colspan="5">{$group.linename}</td>
                </tr>
                </tbody>
            </table>

            <table cellspacing="0" cellpadding="1" class="table table-bordered rb-table-bordered">
                <tbody>
                    {foreach from=$routes item="item" key="key"}
                        {foreach from=$item.children item="subitem" key="subkey"}
                            <tr class="ZTableTr">
                                <td colspan="1" width="12%">天数</td>
                                <td colspan="1" width="12%">{$key+1}</td>
                                <td colspan="1" width="12%">站点</td>
                                <td colspan="1" width="12%">{$subkey+1}</td>
                                <td colspan="1" width="13%">前往地</td>
                                <td colspan="1" width="13%">{$subitem.aim_city}</td>
                                <td colspan="1" width="13%">前往省份/国家地区</td>
                                <td colspan="1" width="13%">{$subitem.aim_country}</td>
                            </tr>
                            <tr class="ZTableTr">
                                <td colspan="1">游览行程</td>
                                <td colspan="7">
                                    <div class="userDiv">
                                        {$subitem.signText.content}
                                    </div>
                                </td>
                            </tr>
                        {/foreach}
                    {/foreach}
                </tbody>
            </table>
        </div>

        {*自愿购物活动补充协议*}
        <div class="">
            <p class="file">附件3：</p>
            <div class="text-center font-heiti"><h3>自愿购物活动补充协议</h3></div>
            <div class="table-responsive">
                <table class="table table-bordered rb-table-bordered">
                    <tr class="">
                        <td class="text-center rb-th" width="8%">序号</td>
                        <td class="text-center rb-th" width="14%">具体时间</td>
                        <td class="text-center rb-th" width="10%">地点</td>
                        <td class="text-center rb-th" width="10%">购物场所名称</td>
                        <td class="text-center rb-th" width="10%">主要商品信息</td>
                        <td class="text-center rb-th" width="12%">最长停留时间（分钟）</td>
                        <td class="text-center rb-th">其他说明</td>
                        <td class="text-center rb-th" width="10%">旅游者签名同意</td>
                    </tr>
                    <tbody>
                    {foreach from=$shops key=num item="shop"}
                        <tr>
                            <td class="text-center rb-td">{$shop.index}</td>
                            <td class="text-center rb-td">{$shop.time}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.addr}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.name}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.goods}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.duration}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.memo}&nbsp;</td>
                            <td class="text-center rb-td">{hlt_result value=$shop.agree}&nbsp;</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
        {$PAGE_BREAK}
        {*自愿参加另行付费旅游项目补充协议*}
        <div class="">
            <p class="file">附件4：</p>
            <div class="text-center font-heiti"><h3>自愿参加另行付费旅游项目补充协议</h3></div>
            <div class="table-responsive">
                <table class="table table-bordered rb-table-bordered">
                    <tr class="">
                        <td class="text-center rb-th" width="8%">序号</td>
                        <td class="text-center rb-th" width="14%">具体时间</td>
                        <td class="text-center rb-th" width="10%">地点</td>
                        <td class="text-center rb-th" width="10%">项目名称和内容</td>
                        <td class="text-center rb-th" width="10%">费用（元）</td>
                        <td class="text-center rb-th" width="12%">项目时长（分钟）</td>
                        <td class="text-center rb-th">其他说明</td>
                        <td class="text-center rb-th" width="10%">旅游者签名同意</td>
                    </tr>
                    <tbody>
                    {foreach from=$chargeables key=num item="shop"}
                        <tr>
                            <td class="text-center rb-td">{$shop.index}</td>
                            <td class="text-center rb-td">{$shop.time}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.addr}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.name}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.price}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.duration}&nbsp;</td>
                            <td class="text-center rb-td">{$shop.memo}&nbsp;</td>
                            <td class="text-center rb-td">{hlt_result value=$shop.agree}&nbsp;</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
        {$PAGE_BREAK}

        {*参团须知及安全提示告知书*}
        <div class="">
            <p class="file">附件5：</p>
            <div class="text-center font-heiti">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <img src="/images/1.png" height="40" width="70" class="pull-left" />
                        <h3 style="line-height: 0.1;">参团须知及安全提示告知书</h3>
                    </div>
                </div>
            </div>
            <p><small>为了确保您的旅行安全顺利，我社特就参团旅行应注意的问题与安全事项，向您提示与告知，请您仔细阅读。</small></p>
            <p><b>一、报名参团/签订旅游合同应注意：</b></p>
            <ol>
                <li>请注意按照您的兴趣、时间和身体条件选择合适的旅游产品线路，请注意合同约定线路与您咨询确认的产品或线路一致。</li>
                <li>孕妇或患有严重高血压、严重心脏病、严重糖尿病、严重身体残疾、精神疾病的客人不宜参团旅游。</li>
                <li>请您在咨询报名时，如实告知并认真填写健康状况一栏。年事已高和身体健康状况不良的客人，如执意参团报名，须提前征得医生和家属子女同意，结伴同行，备好药品。患有心脏病、高血压、肺和血液系统疾病的患者不宜选择高原地区旅游线路。如因自身身体健康原因，产生的后果，由本人及家属自行承担。</li>
                <li>未成年人旅游需有家长或亲属陪同，或提交监护人书面同意出行书。</li>
                <li>境外旅游，安全和保险很重要，我社已购买旅行社责任保险，此险种仅提供本社依法应当承担的赔偿责任，不属个人旅游保险。我社提醒您应自己购买可保障您在境外旅行期间自身生命、身体、财产或者相关利益的短期保险，特别是旅游意外保险与紧急救援保险。我社要求凡年事已高或身患心脏病、糖尿病等可能发生突发意外的客人，应购买包括紧急救援的意外险。行程中如参加体验高风险项目，应购买特殊项目意外险。</li>
                <li>请注意出险后及时通知旅行社和保险公司，及时在当地规定医院就诊或报案处置，保留原始记录或诊断医治证明单据，以便在有效日期内向保险公司申请理赔，否则，追偿理赔无效。 </li>
                <li>请认真填写报名表/合同，确认姓名和证件号码无误，如因自身原因造成机票或其他错误，损失自行承担。</li>
                <li>护照、大陆居民往来港澳通行证、往来台湾通行证是由旅游者自行办理的证件，向旅行社提交此类证件时请确保有效期至少半年，否则造成损失由旅游者自行承担。</li>
                <li>根据旅行目的地和外国领事馆要求的客人资料情况，您需在出发前交纳一定数额的旅行游保证金，具体数额请咨询我社服务人员。您如期回国后，保证金如数退还；如您发生滞留或未如期回国，则保证金不予退还。如因不能按时交纳保证金导致旅行受阻，损失由您自行承担。（注：保证金与使馆要求的财产证明无关，与是否获得签证无关）</li>
                <li>参团机票为团队折扣票，团队折扣票执行航空公司三不准的规定，即：“不能更改、不能签转、不能退票”。如因自身原因取消或变更行程所产生的机票及其它损失由您自身承担。电子客票，航空公司只提供出票行程单，不提供任何其他书面的损失证明。某些团队票航班号无法提前确认，以最终出票为准。</li>
                <li>旅行社一般不保证乘机位置或火车的铺位位置，如您对位置有特别要求，请在合同中注明，否则自行调换解决。</li>
                <li>请在签约报名时咨询确认送签有效时限，使馆以资料备齐时开始计算工作日，最终出签时间及是否给予签证，本社不做任何保证。使馆所需签证资料随时会发生变化，因此送签过程中可能需要您再次补充、更换资料。</li>
                <li>是否准予出、入境，为有关机关的行政权力，如因旅游者自身原因被有关机关拒发签证或不准入境、旅行的，相关责任和业务损失费用由旅游者自行承担。护照送签后，不能随意撤出，且签证资料使馆不退，请您自行保留好资料复印件。</li>
                <li>因自身原因需退团或违约，我社将依照合同约定收取相应损失费或违约金。</li>
                <li>报名参加我社的旅游团队或接受任何实质性委托代理服务，必须签订合同协议。</li>
            </ol>
            <p><b>二、出团前应注意：</b></p>
            <ol>
                <li>请您认真阅读出团通知或确保了解出团信息，在规定时间内到达指定集合地点。带好自己的护照或相关有效证件；国际航班请至少提前3小时到达候机楼，如因自身原因造成无法登机或延误，损失由客人自行承担。</li>
                <li>准备个人用品：如旅游鞋、防晒霜、太阳帽、晴雨伞、墨镜、拖鞋、插头转换器等，有些国家的酒店不提供一次性洗漱用品，请自行准备。</li>
                <li>提前检查身体，自备常用药品：如绷带、创可贴、伤湿止痛膏、感冒药、晕车药、止泻药、消炎药、风油精、健胃药、抗过敏药等。</li>
                <li>安排好家中相应事宜，把出行时间、旅游线路、旅行社联系电话等告知自己的家人或好友，让他们知道您的行程时间，以免让家人担心。</li>
                <li>请在国内官方货币兑换处兑换外币，提前办理移动电话境外通信业务和信用卡境外刷卡业务。</li>
                <li>请在出发前，对当地的法律进行基本了解，避免在不知情的情况下，触犯当地法律。</li>
                <li>请将行李合理配置，保证在旅游期间的行李、随身物品安全。</li>
                <li>某些旅游线路，为了提前安排，领队会在出发地机场或行程第一天向客人收取自费项目费用或境外小费，请理解配合。</li>
            </ol>
            <p><b>三、出游中应注意：</b></p>
            <ol>
                <li>证件/机、车、船票：</li>
                <ol class="list-none">
                    <li>（1）护照是您在国外唯一有效的身份证明，丢失护照将有很大麻烦。护照须由自己保管（有时由领队保管）。丢失护照可由旅行社导游协助补办护照手续，但所发生费用和机票变更费用需由您自己承担。</li>
                    <li>（2）机票一旦丢失需自费补票。如您持有纸质机票，请注意在每次使用机票换登机牌时，查验清楚只撕了当次飞行段的机票联，如多撕或错撕，机票将无法在下一飞行段使用。</li>
                    <li>（3）证件和贵重物品，如护照、身份证、机票、电脑、手机、现金、支票、邀请函原件等，请务必随身携带、妥善保管，一定不要放在托运的行李中，托运的行李一定要包装结实并上锁。</li>
                </ol>
                <li>乘坐交通工具：</li>
                <ol class="list-none">
                    <li>（1）由于诸多因素，飞机、火车等公共交通发生延误或取消可能导致损失，应依照航空、铁路公司提供的方案执行，旅行社不承担赔偿责任。请您配合领队或导游的工作，尽量避免扩大损失。若您因此拒绝搭乘交通工具或拒绝离开交通工具，造成的危害或损失，责任由您自行承担。</li>
                    <li>（2）搭乘飞机时扣好安全带，不要在飞机上使用手提移动电话等相关电子品,不要在飞机上随意走动。</li>
                    <li>（3）按照民航规定，液体、打火机、指甲刀等不能随身携带，必须托运。禁止携带易燃易爆、管制刀具等危险物品登机。</li>
                    <li>（4）在车厢内行走，不要将手扶在门框上，以免行车时或突发紧急制动造成伤害；不要在车厢内吸烟，行李要保管好，夜间防止被盗；睡觉时车窗要关闭，以免受凉。</li>
                    <li>（5）乘机、坐车、上船要注意扶梯，在台阶处站稳，乘车时注意颠簸路段及司机急刹车以免扭伤或摔伤身体。勿在车辆行驶过程中任意更换座位，或站立、行走。头、脚勿伸出窗外，上下车时请注意来车方向，以免发生危险。</li>
                    <li>（6）班机（火车）抵达目的地后，请您不要急于下飞机（火车）而遗忘物品，注意检查</li>
                    <li>（7）如有晕车、腰椎不好请提前跟导游司机说明，尽量安排坐在旅游车靠前的位置</li>
                    <li>（8）贵重物品，如单反相机、名牌用品等，请主动向海关申报。</li>
                </ol>
                <li>宾馆酒店：</li>
                <ol class="list-none">
                    <li>（1）在使用房间内物品时，看清是否是免费使用，如使用非免费物品请看清标价。有的酒店的部分电视频道是收费的，请提前咨询酒店前台。请爱惜酒店物品，损坏需照价赔偿。</li>
                    <li>（2）出入酒店房间请随手关门并把门窗锁好，不要随便开门或让陌生人进入房间以免上当受骗。</li>
                    <li>（3）证件、护照、现金等贵重物品可寄存在酒店保险箱内或随身携带。切勿放在酒店房间内、行李内或旅行车内。</li>
                    <li>（4）沐浴时，要先把防滑垫放好，特别注意地面、浴缸打滑，防止滑倒摔伤。</li>
                    <li>（5）自由活动期间最好结伴而行，离店外出要事先与领队和导游打招呼，并保持手机处于可联系的开机状态，并带上酒店名片以免迷路。如发生意外，一定先与领队和导游联系。</li>
                    <li>（6）退房前，请检查您所携带的行李物品，特别注意您的证件和贵重物品。房间内配备的浴巾、毛巾、手巾、烟缸等物品均不可携带。</li>
                </ol>
                <li>景区景点：</li>
                <ol class="list-none">
                    <li>（1）请记好集合地点、时间、车号、导游或领队电话，万一走失请于集合地点等候或联系导游领队。</li>
                    <li>（2）团体旅行时不可擅自脱团离队，如果要脱离团队请征得全陪、导游同意，并随身携带当地所住宿饭店地址、全陪电话及导游电话，以免发生意外。参加团队旅游，要听从领队或导游的指挥安排。要随时注意团队的去向，以免掉队。旅行期间，团友应互敬互谅，配合领队和导游工作，如有违法或者违规行为，领队和导游有权制止或采取相应措施。</li>
                    <li>（3）搭乘快艇，漂流木筏，参加水上活动，请按规定穿着救生衣，并遵照工作人员的指导。如有腰椎不好、晕水、晕船者请勿游玩水上项目。</li>
                    <li>（4）在乘坐缆车或其它高空项目时，一定要注意安全，系好安全带。 </li>
                    <li>（5）在旅游行程中如出现乏力、多汗、头晕、眼花、心悸等症状时，应及时休息，不可勉强坚持。患有心血管病的老年人，更要加强自我保护。旅游中要有充足的休息和睡眠。若感到体力不支，应及时与领队、导游联系以便在第一时间得到救护和救治。</li>
                    <li>（6）在走山路时靠内侧行走，要注意脚下，切记“走路不看景，看景不走路”，紧跟导游避开危险路线，照相时不要拥挤，以免发生意外。 </li>
                    <li>（7）自觉维护景区内卫生，不乱扔废物，不在禁烟区抽烟，不要投食喂动物，防止被动物抓伤、咬伤。</li>
                    <li>（8）出游时，老人最好有亲朋好友陪伴，以免生病或发生意外时无人照顾。为防止老年人跌跤发生伤害，最好佐以手杖。</li>
                    <li>（9）到土著民族地区请注意民族禁忌，尊重当地民俗。</li>
                    <li>（10）由于天气等诸多客观因素的影响，导游或领队有责任临时调整景点的旅游次序，请您理解、配合。</li>
                    <li>（11）某些景象，如：海水潮汐、日出日落、动物迁徙、欢庆活动等，受自然因素影响，我社不保证客人一定能看到该景观。</li>
                </ol>
                <li>饮食注意：</li>
                <ol class="list-none">
                    <li>（1）旅游中不光顾路边无牌照摊档，不吃不洁和生冷食品，防止病毒性肝炎、痢疾、伤寒等肠道传染病毒经口进入。在外面私自食用不洁食品和海鲜引起的肠胃病，旅行社不承担责任。</li>
                    <li>（2）饮食有特殊要求的客人请提前跟导游打招呼，以便导游更好的给您安排饮食。</li>
                    <li>（3）海边吃海鲜应选择新鲜的海鲜，吃海鲜不宜饮啤酒、不宜与某些水果同吃，且吃海鲜后不要马上去游泳。如您自行食用食物发生问题（非旅行社安排的用餐），旅行社不承担责任。</li>
                </ol>
                <li>购物注意：</li>
                <ol class="list-none">
                    <li>（1）切勿在公共场所露财，购物时勿当众清数钞票。</li>
                    <li>（2）购买商品时请别忘记向商店索取完整的发票和购买证明。</li>
                    <li>（3）在小摊位购买物品时，看好后再与商贩讨价，如无意购买切勿与商贩多做讨价，以免发生争吵。</li>
                    <li>（4）购买贵重或医药食品时，请注意配量、真伪、好坏。因自身原因产生的损失，旅行社不承担责任。 </li>
                    <li>（5）在旅行社安排的店内所购物品出现假冒伪劣，我社承担协助退换索赔责任，若非质量问题，不负责退换索赔，责任自行承担。</li>
                </ol>
            </ol>
            <p><b>四、自由活动中应注意：</b></p>
            <ol>
                <li>旅游行程开始前、结束后及行程中注明的自由时间及活动都属自由活动，不属于旅行社安排活动内，期间可能发生的任何意外或损失，旅行社不承担责任。自由活动期间，我社领队、导游给予的咨询或建议仅供参考，不属旅行社安排，由您自己决定的活动所产生的意外和损失，自行承担责任。</li>
                <li>我社不组织游客参加高风险项目并郑重提醒旅游者谨慎参加赛车、骑马、攀岩、滑翔、探险、漂流、潜水、游泳、滑雪、滑冰、滑板、跳伞、热气球、蹦极、冲浪、近距离接触野生动物等高风险自选活动，若您在自由活动期间，自愿选择此类高风险活动，因此造成人身伤亡或财产损失，责任自负。</li>
                <li>在自由行过程中您自愿参加的一切活动项目，请充分了解活动的内容并严格遵守活动项目的安全规定。建议您主动购买相关保险。我社对您在此过程中发生的意外不承担责任。</li>
                <li>未经导游或领队允许，请勿强行脱离团队自行活动，由此造成的损失，我社不承担责任；我社有权就您的强行脱团行为，追究责任。</li>
                <li>经导游或领队允许，在自行安排活动期间，请注意在自己能够控制风险的范围内选择活动项目，对自身安全负责。在此期间，您若发生人身或财产损失，我社不承担责任。</li>
            </ol>
            <p><b>五、行程结束后应注意：</b></p>
            <ol>
                <li>有些旅行目的地国家，旅游回国后需要销签，请您回国后在机场将护照等所需证件交给领队。</li>
                <li>若您交有保证金，请与旅行社联系，带上保证金收据到旅行社取回保证金。</li>
                <li>若尚有费用增减、尚未开具正规发票，请您及时清算或到我社开取发票。</li>
                <li>如您对此次旅行有投诉，请及时与我社业务人员或经理联系。我们将认真负责并积极帮您协调解决可能遗留的问题。</li>
                <li>我社处理游客投诉时，会参照《团队质量反馈表》，请您秉着公平、公正、实事求是的原则填写《团队质量反馈表》；</li>
                <li>我社服务人员可能会对您进行回访，请您配合并留下宝贵的建议或意见。</li>
            </ol>
        </div>
        <p><small>本文件为合同附件，请仔细阅读，谢谢您的合作，在此谨代表神舟国旅祝您身体健康，旅途愉快！</small></p>
    </div>
 </div>