<?php 
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `page`;");
E_C(\"CREATE TABLE `page` (
  `id` varchar(16) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `page` values('about_privacy','<p>隐私政策<br />\r\n【178团购网】非常重视对用户隐私权的保护，邮件、手机号、购买档案等个人资料为用户重 要隐私，我们承诺不会将个人资料用作它途；承诺不会在未获得用户许可的情况下擅自将用户的个人资料信息出借、出 让、出租或出售给任何第三方，除非：<br />\r\n1. 用户同意让第三方共享资料；<br />\r\n2. 用户同意公开其个人资料，享受为其提供的产品和服务；<br />\r\n3. 本站需要听从法庭传票、法律命令或遵循法律程序；<br />\r\n4. 在某些团购活动中，商家需要用户的姓名、手机号码，以便核实身份，防止竞争对手恶意购买。</p>\r\n<p>我们邮件将为您提供什么信息？ <br />\r\n在您的邮箱里，您将接受到我们网站日常的服务信息以及偶尔的与您的购买有关系的通知。我们尊重并保护您的个人隐私权。我们将通过您的邮箱通知您每天的交易。 </p>\r\n<p>这里的交易安全吗？<br />\r\n必须的。在【178团购网】上的所有交易都是通过合法、正当且正经的付费方式进行的，如：支付宝、财付通、易宝支付等。同时，请相信我们不会、不敢也无法获得您的任何支付帐号、支付密码等信息。 </p>\r\n<p>如果提供商品的商家搬迁、倒闭、拒绝服务了怎么办？<br />\r\n如果您的178优惠券还没有使用，我们将支付所有的钱。</p>\r\n<p>使用说明<br />\r\n【178团购网】用户可以通过设定的密码来保护账户和资料安全。用户应当对其密码和178优惠券中的验证码的保密负全部责任。请不要和他人分享此类信息。如果您使用的是公共电脑，请在离开电脑时退出【178团购网】保证您的信息不被后来的使用者获取。</p>\r\n<p>其他问题，请联系【178团购网】。</p>');");
E_D("replace into `page` values('about_terms','<p>一、服务条款的确认和接受<br />\r\n本服务条款是用户（您）与【178团购网】之间的协议。【178团购网】网站由【178团购网】或其 关联公司所运行的多个网站和网页（合称\"【178团购网】\"）构成。 </p>\r\n<p>(一) 【178团购网】在此提醒，用户（您）使用【178团购网】提供的服务必须认真阅读并完全接受本服务条款。如果您不同意本服务条款和<br />\r\n/或随时对其的修改，则不可使用服务。</p>\r\n<p>(二) 这些条款可由【178团购网】公司随时更新，且毋须另行通知。【178团购网】服务条款(以下简称\"服务条款\")一旦发生变更, 【178团购网】将在网页上公布修改内容。修改后的服务条款一旦在网页上公布即有效代替原来的服务条款。您可随时登陆【178团购网】网查阅最新版服务条款。</p>\r\n<p>(三) 在下订单的同时，您也同时承认了您拥有接受【178团购网】提供的服务的权利能力和行为能力，并且您将对您在订单中提供的所有信息的真实性负责。如果您未达到与【178团购网】订立有约束力的合同(包括但不限于电子合同)的法定年龄, 则您不可使用服务且不能接受服务条款。</p>\r\n<p>二、【178团购网】提供的服务<br />\r\n(一) 【178团购网】拥有子公司和关联法律实体（\"关联实体\"）。在某些时候，这些公司将代表【178团购网】向您提供服务。您认知并同意子公司和关联公司有权向您提供服务。</p>\r\n<p>(二) 【178团购网】目前经由其产品服务组合，向用户提供丰富的网上及线下资源及诸多产品信息与服务信息，包括但不限于各种团购信息服务、电子邮件、网上论坛、聊天室等（以下简称\"服务\"或\"本服务\"）。本服务条款适用于【178团购网】及其关联<br />\r\n实体提供的各种服务，但当某一特定服务另有单独的服务条款、指引或规则，您应遵守本服务条款及【178团购网】随时公布的与该服务相关的服务条款、指引或规则等。前述所有的指引和规则，均构成本服务条款的一部分。</p>\r\n<p>(三) \"团购信息服务\"是【178团购网】提供的服务之一，是指【178团购网】通过互联网或移动互联网或其他媒体将具有相同购买意向的零散消费者集合起来，向餐饮、商场等经营单位进行大批量购买，从而获取信息服务佣金的信息服务。</p>\r\n<p>(四) 【178团购网】致力于用户为提供最优服务体验。您认知并同意【178团购网】提供的服务的形式和本质可不经事先通知您而不断创新变换。</p>\r\n<p>三、用户使用服务<br />\r\n(一) 用户必须自行配备上网和使用电信增值业务所需的设备，自行负担个人上网或第三方（包括但不限于电信或移动通信提供商）收取的通讯费、信息费等有关费用。</p>\r\n<p>(二) 除您与【178团购网】另有约定外，您同意本服务仅供个人使用且非商业性质的使用，您不可对本服务任何部分或本服务之使用或获得，进行复制、拷贝、出售、或利用本服务进行调查、广告、或用于其他商业目的，但【178团购网】公司对特定服务另有适用指引或规则的除外。</p>\r\n<p>(三) 您使用【178团购网】提供的服务,应当遵守国家的有关法律、法规和行政规章制度。</p>\r\n<p>(四) 不得发送任何妨碍社会治安或非法、虚假、骚扰性、侮辱性、恐吓性、伤害性、破坏性、挑衅性、淫秽色情性等内容的信息。</p>\r\n<p>(五) 基于【178团购网】所提供的网络服务的重要性，用户应同意：<br />\r\n1. 提供详尽、准确的个人资料。<br />\r\n2. 不断更新注册资料，符合及时、详尽、准确的要求。<br />\r\n3. 用户应当确保其所使用的用户名、密码和其他个人信息的安全，并需要对以其用户名进行的所有活动和事件负全责。<br />\r\n4. 每个用户名与密码仅对应于一个用户，无法转移。</p>\r\n<p>四、团购服务规则<br />\r\n【178团购网】提供的服务之一 ---- 限时网络团购服务，用户在使用【178团购网】购服务时，除应当理解并遵守本条款前述规则之外，还应当理解并遵守以下团购服务规则：</p>\r\n<p>(一) 团购产品、价格与数量</p>\r\n<p>1.【178团购网】承诺所发布的每一款产品信息皆为真实有效的产品信息，由【178团购网】与商户签订的协议作为保证。【178团购网】将合理审查商户有关资质以及其产品的质量及安全性的相关证书及证明。团购产品的质量和安全由商户负责。</p>\r\n<p>2.【178团购网】有权决定【178团购网】优惠券价格、团购成功最低限购数量、每位用户每次购买【178团购网】优惠券数量和每次团购销售的【178团购网】优惠券总数等，并保留随时修改的权利。</p>\r\n<p>3.用户购买团购产品，视为认可团购价格、限购数量，并接受【178团购网】优惠券及网页上的说明所提示的使用限制、本条款及其它相关规则。</p>\r\n<p>(二) 【178团购网】优惠券的取得与使用</p>\r\n<p>1.【178团购网】优惠券必须在标明的有效期内使用，除非经过【178团购网】和商户同意，超过有效期的【178团购网】优惠券不可作为消费凭证。</p>\r\n<p>2.【178团购网】优惠券不记名、不挂失，如因用户个人保管不善等原因导致的【178团购网】优惠券遗失、密码泄露、冒领等，由用户本人负责。</p>\r\n<p>3.【178团购网】优惠券仅作为持有【178团购网】优惠券的用户消费凭证，不可兑换现金。</p>\r\n<p>4.【178团购网】优惠券不可与商户其他优惠同时享用，除非商户允许或特别说明。</p>\r\n<p>5.用户非经【178团购网】购买而从任何其它渠道获得的【178团购网】优惠券，因此发生的任何问题，包括但不限于不能获得产品或服务等，基于法律的原因【178团购网】将无法保障您的合法权益。</p>\r\n<p>6.用户在购买【178团购网】优惠券后自行交易、转让，因此发生的任何问题【178团购网】不承担任何责任。</p>\r\n<p>7.【178团购网】优惠券规定必须事先预约的，用户应提前向商户预约，未提前预约造成未能享受服务或消费的，【178团购网】不承担任何责任。</p>\r\n<p>8.用户持【178团购网】优惠券进行消费后，如无特别说明，用户有权要求商户就【178团购网】优惠券消费开具足额正式发票，足额指用户购买【178团购网】优惠券的金额，而非团购产品的原价格。【178团购网】无义务向用户开具任何发票，就商户向用户开具发票不承担任何责任。</p>\r\n<p>9. 用户清楚的知悉，用户在商户处消费时将由商户应就其团购产品在用户消费过程中产生的所有损失与损害负完全责任。</p>\r\n<p>10．除非【178团购网】或【178团购网】优惠券另有说明，每张【178团购网】优惠券应当一次性全部兑换。</p>\r\n<p>11.【178团购网】有权自行设计返利活动条款，就用户参与返利活动拥有独立判断和决定权，包括但不限于是否允许用户参与返利活动，用户是否满足获得返利条件、用户获得返利如何使用等。</p>\r\n<p>12.【178团购网】有权在发现了本网站上显现的团购产品信息明显错误或缺货的情况下，单方面修改或撤回任何陈述和承诺。</p>\r\n<p>13.团购产品的价格和可获性都在【178团购网】上指明。这类信息将随时更改且不发任何通知。</p>\r\n<p>14.在确认了您的订单后，由于商户提价，税额变化引起的团购产品价格变化，或是由于【178团购网】的错误等造成团购产品价格变化，您有权取消您的订单，并希望您能及时通过电子邮件或电话通知【178团购网】客户服务部。</p>\r\n<p>(三) 退款</p>\r\n<p>发生以下情况时，我们将及时安排向用户退款：</p>\r\n<p>1.未达到最低团购人数，造成本次团购未成功的；</p>\r\n<p>2.用户团购成功后，因商户原因不能在团购有效期内提供服务或拒绝提供服务的，如商户逃走、关门、破产等情况。</p>\r\n<p>五、用户密码和账户安全<br />\r\n(一) 为获得某些服务，您可能会被要求提供自身信息（如身份或联系资料）作为服务的登记程序的一部分，或作为您持续使用服务的一部分。您同意您给予【178团购网】的任何登记信息均是准确、正确和最新的。用户名和昵称的注册与使用应符合网络道德，遵守中华人民共和国的相关法律法规。</p>\r\n<p>(二) 在完成登记程序并收到密码及帐号后，您应维持密码及帐号的机密安全。您应对任何人利用您的密码及帐号所进行的活动负完全的责任，【178团购网】公司无法对非法或未经您授权使用您帐号及密码的行为作出甄别，因此【178团购网】公司不承担任何责任。在此，您同意并承诺做到∶</p>\r\n<p>1.当您的密码或帐号遭到未获授权的使用，或者发生其他任何安全问题时，您会立即有效通知到【178团购网】。</p>\r\n<p>2.用户同意接受【178团购网】通过电子邮件、网页或其他合法方式向用户发送商品促销或其他相关商业信息。在使用电信增值服务的情况下，用户同意接受本公司及合作公司通过增值服务系统或其他方式向用户发送的相关服务信息或其他信息，其他信息包括但不限于通知信息、宣传信息、广告信息等。</p>\r\n<p>六、隐私与您的个人信息 <br />\r\n(一) 关于【178团购网】的数据保护惯例的信息，请查阅【178团购网】的隐私政策。该政策解释了【178团购网】如何处理您的个人信息，并在您使用服务时保护您的隐私。</p>\r\n<p>(二) 【178团购网】对用户的电子邮件、手机号等隐私资料进行保护，承诺不会在未获得用户许可的情况下擅自将用户的个人资料信息出租或出售给任何第三方，但以下情况除外：</p>\r\n<p>1.用户同意让第三方共享资料。</p>\r\n<p>2.用户同意公开其个人资料，享受为其提供的产品和服务。</p>\r\n<p>3.【178团购网】需要听从法庭传票、法律命令或遵循法律程序。</p>\r\n<p>4.【178团购网】发现用户违反了【178团购网】服务条款或【178团购网】其它使用规定。</p>\r\n<p>(三) 关于用户隐私的具体协议以【178团购网】的隐私声明为准。如果用户提供的资料包含有不正确的信息，【178团购网】保留结束用户使用网络服务资格的权利。</p>\r\n<p>(四) 您同意按照【178团购网】的隐私政策使用您的数据。</p>\r\n<p>七、关于在【178团购网】网张贴的公开信息<br />\r\n(一) 用户确认并同意，【178团购网】所有论坛、电子公告牌服务、聊天室和/或其他消息或通讯设施（以下统称社区）的讨论是公开的，不是私人的通信，因此其他人在没有用户的认可时可能会阅读用户的沟通内容。任何经由本服务以上载、张贴、发送即时信息、电子邮件或任何其他方式传送的资讯、资料、文字、软件、音乐、音讯、照片、图形、视讯、信息、用户的登记资料或其他资料（以下简称\"内容\"），无论系公开还是私下传送，均由内容提供者承担责任。【178团购网】无法控制经由本服务传送之内容，也无法对用户的使用行为进行全面控制，因此不保证内容的合法性、正确性、完整性、真实性或品质，不承担任何有关社区和用户参与社区的任何行动的任何责任；您已预知使用本服务时，可能会接触到令人不快、不适当或令人厌恶之内容，并同意将自行加以判断并承担所有风险，而不依赖于【178团购网】。</p>\r\n<p>(二) 您同意您在本服务公开使用区域或服务项目内张贴之内容，包括但不限于文字、照片、图形或影音资料等内容，视为不可撤销地授予【178团购网】全球性、免许可费、非独家、可完全转授权、及永久有效的使用权利，【178团购网】可以为了展示、散布及推广或任何其他目的，将前述内容复制、修改、改写、改编或出版及可供【178团购网】转载手机使用。</p>\r\n<p>(三) 对您张贴的内容，您保证已经拥有必要权利或授权以进行该内容提供、张贴、上载、提交等行为。</p>\r\n<p>(四) 链接及搜索引擎服务：【178团购网】网包含的其他网站链接仅为方便用户目的不视为【178团购网】认可支持该第三方网站的内容。本<br />\r\n服务或第三人可提供与其他国际互联网上之网站或资源之链接。由於【178团购网】无法控制这些网站及资源，您了解并同意：<br />\r\n无论此类网站或资源是否可供利用，将由您自行决定。鉴于是否使用决定由您自行决定,故因您使用或依赖任何此类<br />\r\n网站或资源发布的或经由此类网站或资源获得的任何内容、商品或服务所产生的任何损害或损失，【178团购网】不负任何直<br />\r\n接或间接之责任。若您认为该链接所载的内容或搜索引擎所提供之链接的内容侵犯您的权利，【178团购网】建议您与该网站<br />\r\n或法律部门联系，寻求法律保护。</p>\r\n<p>(五) 但在任何情况下，【178团购网】有权(但无义务)依其自行之考量，拒绝和删除可经由本服务提供之违反本条款的或其他引起<br />\r\n【178团购网】公司或其他用户反感的任何内容。如用户违反国家法律法规或本服务条款，【178团购网】有权直接采取一切必要的措施<br />\r\n包括但不限于经自行裁决和判断而过滤、编辑或移除用户发布的任何内容、暂停或查封用户帐号，停止向用户提供<br />\r\n服务的全部或部分而不需承担任何责任，保存有关记录，并向有关机关报告；如导致【178团购网】或合作公司遭受任何损害<br />\r\n或遭受任何来自第三方的纠纷、诉讼、索赔要求等，【178团购网】有权向用户索赔相应的损失。</p>\r\n<p>八、网络服务内容的所有权<br />\r\n(一) 【178团购网】定义的网络服务内容包括：文字、软件、声音、图片、录象、图表中的全部内容；电子邮件的全部内容；【178团购网】为用户提供的其他信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。</p>\r\n<p>(二) 用户只能在【178团购网】和相关权利人授权下才能使用这些内容，而不能擅自使用、抄袭、复制、修改、编撰这些内容、或创造与内容有关的衍生产品。</p>\r\n<p>(三) 任何用户接受本服务条款，即表明该用户主动将其在任何时间段在【178团购网】发表的任何形式的信息的著作财产权，包括并不限于：复制权、发行权、出租权、展览权、表演权、放映权、广播权、信息网络传播权、摄制权、改编权、翻译权、汇编权以及应当由著作权人享有的其他可转让权利无偿独家转让给【178团购网】所有，允许【178团购网】单独或与其他版权作品一起通过任何媒体、技术使用、复制、修改、出版、编辑、翻译、发行、表演、展示该信息，没有时间和地域限制。同时表明该用户许可【178团购网】有权利就任何主体侵权而单独提起诉讼，并获得全部赔偿。</p>\r\n<p>九、服务风险及免责声明<br />\r\n(一) 您明示理解并同意，您对使用服务独自承担风险并且服务按\"现状\"的方式提供。【178团购网】提供的服务涉及到互联网及移动通讯等服务，可能会受到各个环节不稳定因素的影响。因此服务存在因上述不可抗力、计算机病毒、系统不稳定、用户所在位置、用户关机、通信线路原因等造成的服务中断或不能满足用户要求的风险。用户须承担以上风险，因此：</p>\r\n<p>1. 【178团购网】、其子公司和关联方，不就以下各项向您作出陈述或保证：</p>\r\n<p>(1)您对服务的使用将符合您的需求。</p>\r\n<p>(2)您对服务的使用将无中断、及时、安全或没有错误。</p>\r\n<p>2. 【178团购网】对因前述风险导致用户不能发送和接受阅读消息、或传递错误，个人设定之时效、未予储存或其他问题不承<br />\r\n担任何责任。</p>\r\n<p>3. 您明示理解并同意，通过使用服务获得的任何材料由您自行作出并承担风险。</p>\r\n<p>4. 您从【178团购网】获得的或通过服务或从服务获得的任何建议或信息（无论口头还是书面的）均不创立本条款中未明确规定的任何保证。</p>\r\n<p>(二) 如本公司的系统发生故障影响到本服务的正常运行，本公司承诺在第一时间内与相关单位配合，及时处理进行修复。<br />\r\n此外，【178团购网】保留不经事先通知为维修保养、升级或其他目的暂停本服务任何部分的权利。</p>\r\n<p>(三) 使用及储存：您承认关於本服务的使用【178团购网】有权制订一般措施及限制，包含但不限於本服务将保留用户信息、电子邮件信息、所张贴内容或其他上载内容之最长期间。通过本服务存储或传送之任何信息、通讯资料和其他内容，如被删除或未予储存，您同意【178团购网】毋须承担任何责任。您也同意，【178团购网】有权依其自行之考量，不论通知与否，随时变更这些一般措施及限制。</p>\r\n<p>(四) 责任限制</p>\r\n<p>1. 如因不可抗力或其他【178团购网】无法控制的原因使【178团购网】销售系统崩溃或无法正常使用导致网上交易无法完成或丢失有关的信息、记录等，【178团购网】会尽可能合理地协助处理善后事宜，并努力使客户免受经济损失。</p>\r\n<p>2. 在任何情形下，【178团购网】就每一张【178团购网】优惠券承担的全部赔偿责任。</p>\r\n<p>(五) 豁免责任</p>\r\n<p>1. 用户通过【178团购网】购买的【178团购网】优惠券由商户兑现其商品或服务，商户而非【178团购网】，是【178团购网】优惠券、商品以及服务的销售商和提供<br />\r\n商，商户负责兑现您所购买的产品或服务的【178团购网】优惠券。用户应当就其和商户、其他用户之间的互动单独承担责任,但窝<br />\r\n窝将会协助您进行处理</p>\r\n<p>十、服务变更、中断、中止和终止<br />\r\n(一) 服务的变更</p>\r\n<p>1. 本服务的所有权和运作权归【178团购网】。【178团购网】提供的服务将按照其发布的章程、服务条款和操作规则严格执行。</p>\r\n<p>2. 【178团购网】特别提请用户注意，【178团购网】为了保障公司业务发展和调整的自主权，【178团购网】拥有经或未经事先通知而修改服务内<br />\r\n容、中断或中止部分或全部服务的权利，修改会公布于【178团购网】网站相关页面上，一经公布视为通知。</p>\r\n<p>3. 【178团购网】有权随时改变或中断【178团购网】任何方面的特征或设置，包括但不限于文案、内容、服务时间、访问所需的设备。【178团购网】对文本或摄影有关的排字错误或疏忽不负责。此外，【178团购网】有权随时停止传播任何信息或信息的一部分或某一类别信息，有权改变或减少传输方式、传输速度或其他信号特征。</p>\r\n<p>(二) 服务的中断、中止和终止</p>\r\n<p>1. 如发生下列任何一种情形，本公司有权随时中止或终止向用户提供服务而无需通知用户：</p>\r\n<p>(1) 用户提供的个人资料不真实；</p>\r\n<p>(2) 用户违反本服务条款的规定；</p>\r\n<p>(3) 按照主管部门的要求；</p>\r\n<p>(4) 其他本公司认为是符合整体服务需求的特殊情形</p>\r\n<p>2. 用户或【178团购网】可随时根据实际情况中断一项或多项网络服务。一旦【178团购网】认为用户的行为是【178团购网】不可接受的或违反本服务条款，【178团购网】有权立即终止或暂停对任何用户的服务。用户对服务条款修改有异议，或对【178团购网】的服务不满，可以行使如下权利：</p>\r\n<p>(1) 停止使用【178团购网】的网络服务。</p>\r\n<p>(2) 通告【178团购网】停止对该用户的服务。</p>\r\n<p>十一、 【178团购网】商标信息<br />\r\n(一) 【【178团购网】、【178团购网】logo】等，以及其他【178团购网】标志及产品、服务名称，均为【178团购网】公司之商标（以下简称\"【178团购网】标识\"）。未经【178团购网】事先书面同意，您不得将【178团购网】标记以任何方式展示或使用或作其他处理，也不得向他人表明您有权展示、使用、或其他有权处理【178团购网】标识的行为。</p>\r\n<p>十二、服务条款的修改<br />\r\n(一) 【178团购网】有权在必要时对本服务条款和服务内容作出变更，一旦条款及服务内容产生变动，【178团购网】将会在【178团购网】网首页页面上提示变更内容。</p>\r\n<p>(二) 如果不同意【178团购网】对服务条款和服务内容所做的修改，用户应主动取消此项网络服务。</p>\r\n<p>(三) 如果我们改变我们的服务条款和服务内容，而您继续使用我们的服务，你将被视为您对修改后的条款和条件是同意的。</p>\r\n<p>十三、其他<br />\r\n(一) 本服务条款使用的标题仅为方便阅读而加入，并不会对本协议的条款起到定义或限制的作用。</p>\r\n<p>(二) 如发生【178团购网】服务条款与中国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它合法条款则依旧保持对用户产生法律效力和影响。</p>\r\n<p>(三) 本服务条款规定是可分割的，如本服务条款任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。</p>\r\n<p>(四) 本协议的订立、执行和解释及争议的解决均应适用中国法律。</p>\r\n<p>(五) 如双方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向被告所在地人民法院提出诉讼解决。</p>\r\n<p>&nbsp;<br />\r\n</p>');");

require("../../inc/footer.php");
?>