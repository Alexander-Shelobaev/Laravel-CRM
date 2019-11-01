@extends('layouts.landing')

@section('title', 'Software Provider Ltd')
@section('description', 'Большинство поисковых серверов отображают содержимое поля description при выводе результатов поиска. Если этого тега нет на странице, то поисковый движок просто перечислит первые встречающиеся слова на странице, которые, как правило, оказываются не очень-то и в тему.')

@section('content')	

<!-- begin #home -->
<div id="home" class="content has-bg home">
	<div class="content-bg">
		<img src="{{asset('/assets-landing/img/bg/bg-home.jpg')}}" alt="Home" />
	</div>
	<div class="container home-content">
		<h1>«Software Provider» Ltd</h1>
		<h3>Автоматизация транспортных услуг, заказная разработка, внедрение бизнес-приложений, построение систем электронной коммерции и профессиональные ИТ-услуги, разработка веб-порталов, интернет магазинов и сайтов.</h3>
		<!--<p>
			Автоматизация транспортных услуг, заказная разработка, внедрение бизнес-приложений, построение систем электронной коммерции и профессиональные ИТ-услуги, разработка веб-порталов, интернет магазинов и сайтов. <a href="#">theme panel</a> to select your favorite theme color.
		</p>-->
		<a href="#contact" class="btn btn-theme">Cвяжитесь с нами</a> <!--<a href="#" class="btn btn-outline">Purchase Now</a><br />
		<br />
		or <a href="#">subscribe</a> newsletter-->
	</div>
</div>
<!-- end #home -->

<!-- begin #about -->
<div id="about" class="content" data-scrollview="true">
	<div class="container" data-animation="true" data-animation-type="fadeInDown">

        <h2 class="content-title">О нас</h2>
        <p>Основными направлениями деятельности «Software Provider» Ltd являются:</p>

        <ul>
           <li>Построение e-Commerce – системы продаж и клиентского обслуживания через Интернет;</li>
           <li>Разработка интранет (внутренних) / интернет порталов;</li>
           <li>Автоматизация транспортных услуг – расписания, обработка технологических телеграмм, агентские системы и электронная коммерция;</li>
           <li>Разработка, внедрение и поддержание B2B решений;</li>
           <li>ИТ услуги – заказная разработка и интеграционные решения;</li>
           <li>Веб разработка – заказная разработка веб-порталов, интернет магазинов и сайтов.</li>
       </ul>

       <p>Глубокое понимание бизнеса клиента, выявление и тщательный анализ проблем, препятствующих его развитию, позволяет предложить оптимальные варианты решения наиболее актуальных бизнес-задач и, в рамках каждого проекта, достичь максимального экономического результата для клиента.

           Эксперты «Software Provider» Ltd постоянно совершенствуют свои знания и имеют на сегодняшний день свыше 50 действующих сертификатов ведущих мировых производителей программного обеспечения. Работа каждого из них является образцом профессионализма во всех сферах деятельности и видах услуг, которые мы оказываем.

       «Software Provider» Ltd является надежным деловым партнером и строит взаимоотношения с клиентами на долговременной и взаимовыгодной основе. Нашими клиентами и партнерами являются крупнейшие предприятия и организации России, среди которых: ОАО Аэрофлот, Государственная корпорация Росатом, IBM и др..</p>

   </div>
</div>
<!-- end #about -->

<!-- begin #milestone -->
<div id="milestone" class="content bg-black-darker has-bg" data-scrollview="true">
	<div class="content-bg">
		<img src="{{asset('/assets-landing/img/bg/bg-milestone.jpg')}}" alt="Milestone" />
	</div>
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 col-sm-3 milestone-col">
				<div class="milestone">
					<div class="number" data-animation="true" data-animation-type="number" data-final-number="10">0</div>
					<div class="title">Лет на рынке</div>
				</div>
			</div>
			
			<div class="col-md-3 col-sm-3 milestone-col">
				<div class="milestone">
					<div class="number" data-animation="true" data-animation-type="number" data-final-number="20"></div>
					<div class="title">Сотрудников</div>
				</div>
			</div>
			
			<div class="col-md-3 col-sm-3 milestone-col">
				<div class="milestone">
					<div class="number" data-animation="true" data-animation-type="number" data-final-number="50">0</div>
					<div class="title">Сертификатов</div>
				</div>
			</div>
			
			<div class="col-md-3 col-sm-3 milestone-col">
				<div class="milestone">
					<div class="number" data-animation="true" data-animation-type="number" data-final-number="112+">0</div>
					<div class="title">Выполненных проектов</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end #milestone -->




<!-- begin #team -->
<div id="team" class="content" data-scrollview="true">
	<div class="container">

		<h2 class="content-title">Наша команда</h2>
		<p class="content-desc">
			Техническая команда «Software Provider» Ltd обладает высоким профессионализмом — более 50 сертификатов, и использует в работе следующие IT технологии:
		</p>
		<div class="row">
			<div class="col-md-6">
				<h3>Прикладное программное обеспечение:</h3>
				<ul>
					<li>Интеграционные системы — IBM WebSphere Cast Iron;</li>
					<li>CMS – Битрикс, Joomla!, WordPress, Drupal;</li>
					<li>Sitatex — обработка технологических телеграмм;</li>
					<li>SmartVista — интегрированная полнофункциональная система, предназначенная для организации и ведения всего спектра операций электронного бизнеса. Продукты SmartVista сертифицированы международными платежными системами Visa, MasterCard, American Express, Diners Club...;</li>
					<li>SabreSonic Host / Sabre Web Services / Travel Data — инструменты бронирования билетов;</li>
					<li>CRM (Customer Relationship Management) — Битрикс24.</li>
				</ul>
			</div>
			<div class="col-md-4">
				<h3>Системное программное обеспечение:</h3>
				<ul>
					<li>Операционные системы: Linux, Solaris (ОС для платформы SPARC), Windows;</li>
					<li>СУБД: PostgreSQL, Oracle RDBM, Redis (сетевое журналируемое хранилище данных), MySQL.</li>
				</ul>
			</div>
			<div class="col-md-2">
				<h3>Разработка:</h3>
				<ul>
					<li>PHP;</li>
					<li>Java;</li>
					<li>PL/SQL (процедурное расширение SQL, для Oracle RDBM);</li>
					<li>JavaScript;</li>
					<li>Bootstrap;</li>
					<li>CSS;</li>
					<li>HTML.</li>
				</ul>
			</div>
		</div>
		
	</div>
</div>
<!-- end #team -->

<!-- begin #quote -->
<div id="quote" class="content bg-black-darker has-bg" data-scrollview="true">
	<div class="content-bg">
		<img src="{{asset('/assets-landing/img/bg/bg-quote.jpg')}}" alt="Quote" />
	</div>
	<div class="container" data-animation="true" data-animation-type="fadeInLeft">
		<div class="row">
			<div class="col-md-12 quote">
				<i class="fa fa-quote-left"></i> Доводим проекты до конца! <!--<span class="text-theme">success</span>--><i class="fa fa-quote-right"></i>
				<small>Наш девиз</small>
			</div>
		</div>
	</div>
</div>
<!-- end #quote -->




<!-- beign #service -->
<div id="service" class="content" data-scrollview="true">
	<div class="container">
		<h2 class="content-title">Предоставляемые услуги</h2>
		<!-- <p class="content-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p> -->
		<div class="row">
			@foreach ($services as $value)
			<div class="service col-md-4 col-sm-4">
				<div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn"><i class="fas fa-{{ $value->img }}"></i></div>
				<div class="info">
					<h4 class="title">{{ $value->title }}</h4>
					<p class="desc">{{ $value->short_text }}</p>
				</div>
			</div>
			@endforeach	
		</div>
	</div>
</div>
<!-- end #service -->

<!-- beign #action-box -->
<div id="action-box" class="content has-bg" data-scrollview="true">
	<div class="content-bg">
		<img src="{{asset('/assets-landing/img/bg/bg-action.jpg')}}" alt="Action" />
	</div>
	<div class="container" data-animation="true" data-animation-type="fadeInRight">
		<div class="row action-box">

			<div class="col-md-9 col-sm-9">
				<div class="icon-large text-theme">
					<i class="fa fa-binoculars"></i>
				</div> 
				<h3>Для подробного ознакомления свяжитесь с нами</h3>
				<p>Наши специалисты с удовольствием ответят на все ваши вопросы</p>
			</div>

			<div class="col-md-3 col-sm-3">
				<a href="#contact" class="btn btn-outline btn-block">Cвяжитесь с нами</a>
			</div>

		</div>
	</div>
</div>
<!-- end #action-box -->




<!-- begin #portfolio -->
<div id="work" class="content" data-scrollview="true">
	<div class="container" data-animation="true" data-animation-type="fadeInDown">
		<h2 class="content-title">Портфолио</h2>
		<p class="content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />sed bibendum turpis luctus eget</p>
		<div class="row row-space-10">
			@foreach ($portfolios as $value)
			<div class="col-md-3 col-sm-6">
				<div class="work">
					<div class="desc">
						<div class="work-cont-desc">
							<span class="desc-title">{{ $value->title }}</span>
							<span class="desc-text">{{ $value->short_text }}</span>
							<span class="desc-btn"><a href="{{ $value->href }}" class="btn btn-theme btn-sm" target="_blank">Подробнее</a></span>
						</div>
					</div>
					<div class="image">
						<a href="#"><img src="{{asset('/assets-landing/img/'.$value->img)}}" alt="{{ $value->title }}" /></a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- end #portfolio -->

<!-- begin #client -->
<div id="client" class="content has-bg bg-green" data-scrollview="true">
	<!-- begin content-bg -->
	<div class="content-bg">
		<img src="{{asset('/assets-landing/img/bg/bg-client.jpg')}}" alt="Client" />
	</div>
	<!-- end content-bg -->
	<!-- begin container -->
	<div class="container" data-animation="true" data-animation-type="fadeInUp">
		<h2 class="content-title">Отзывы наших клиентов</h2>
		<!-- begin carousel -->
		<div class="carousel testimonials testimonials-client slide" data-ride="carousel" id="testimonials-client">
			<!-- begin carousel-inner -->
			<div class="carousel-inner text-center">
				<!-- begin item -->
				<div class="item active">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						Специалисты компании «Software Provider» Ltd - отзывчивые и компетентные сотрудники с опытом работы.<br>
						Надеюсь на дальнейшее не менее плодотворное сотрудничество!
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">Шашамков С.Н. </span>, Директор ООО "АВИ"</div>
				</div>
				<!-- end item -->
				<!-- begin item -->
				<div class="item">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						Сильная и профессиональная команда. Действительно слышат пожелания клиентов<br />
						и оперативно решают любые вопросы.<br />
						Надеемся на продолжение нашего взаимовыгодного сотрудничества.
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">Нируахметов Т.Р. </span>, Директор ООО "РУЩСТ"</div>
				</div>
				<!-- end item -->
				<!-- begin item -->
				<div class="item">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						Приложение позволяет нашим коллегам лучше работать с данными, которые у нас есть.<br />
						Таким образом, мы можем в большей степени использовать потенциал,<br />
						который эти данные нам предоставляют.<br />
						Кроме того, вся необходимая информация для руководства теперь доступна сразу одним кликом.
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">Шонько О.А. </span>, ООО "ВЫДВИЖЕНИЕ"</div>
				</div>
				<!-- end item -->
			</div>
			<!-- end carousel-inner -->
			<!-- begin carousel-indicators -->
			<ol class="carousel-indicators">
				<li data-target="#testimonials-client" data-slide-to="0" class="active"></li>
				<li data-target="#testimonials-client" data-slide-to="1" class=""></li>
				<li data-target="#testimonials-client" data-slide-to="2" class=""></li>
			</ol>
			<!-- end carousel-indicators -->
		</div>
		<!-- end carousel -->
	</div>
	<!-- end containter -->
</div>
<!-- end #client -->




<!-- begin #work -->
<div id="partners" class="content" data-scrollview="true">
	<!-- begin container -->
	<div class="container" data-animation="true" data-animation-type="fadeInDown">
		<h2 class="content-title">Партнеры</h2>
		<p class="content-desc">Наши партнеры располагают значительным опытом и большими ресурсами, позволяющими осуществить любой совместный проект:</p>

		<ul>
			<li><a href="http://www.ibm.com/ru-ru/" target="_blank">IBM</a>&nbsp;— транснациональная корпорация со штаб-квартирой в Армонке, штат Нью-Йорк (США), один из крупнейших в мире производителей и поставщиков аппаратного и программного обеспечения, а также ИТ-сервисов и консалтинговых услуг. Лучший мировой поставщик интеграционных платформ.</li>
			<li><a target="_blank" href="http://bpcbankingtech.com/ru">БПЦ Банковские Технологии</a> - основана в 1995 году. Архитектор, разработчик и вендор семейства продуктов SmartVista, которая предназначена для решения всех задач, связанных с управлением сетями банкоматов, тарификацией и выставлением счетов, мобильными и бесконтактными платежами, взаиморасчетами, приемом платежей в торговых точках, эмиссией карт, эквайрингом, микрофинансированием и обработкой электронных платежей.<br>
         </li>
         <li><a title="РБС" target="_blank" href="http://www.rbspayment.ru/">Рунет Бизнес Системы (РБС)</a> - работает на рынке интернет-эквайринга с 2000-го года. РБС предоставляет услуги интернет-эквайринга пластиковых карт международных платежных систем с использованием современных технологий и международных стандартов электронных платежей. РБС предлагает весь необходимый функционал для банков, торгово-сервисных предприятий, реализующих товары или услуги в интернете, позволяя принимать платежи в интернет-магазинах с помощью пластиковых карт международных платежных систем.<br>
         </li>
         <li><a href="http://www.dis-group.ru/" target="_blank">Data Integration Software</a>&nbsp;— авторизованный дистрибьютор корпорации&nbsp;<a href="https://www.informatica.com/" target="_blank">Informatica</a>&nbsp;в России и странах СНГ. С 2005 года компания Data Integration Software предлагает своим партнерам и заказчикам в России и СНГ лидирующую промышленную платформу для интеграции и обеспечения качества корпоративных данных, благодаря которой компании по всему миру обеспечивают доступ, интегрируют, визуализируют данные, осуществляют аудит информационных активов для повышения эффективности своего бизнеса, увеличения доходов клиентов и выполнения требований регулирующих органов.</li>
         <li><a href="http://www.asoft.ru/" target="_blank">ASoft</a>&nbsp;— ведущий российский разработчик программного обеспечения. Поставщик ряда собственных программных продуктов (ASoft CRM, ASoft Contact Manager, ASoft Collaboration, ASoft Doc и др.).</li>
         <li><a href="http://www.teamwox.com/ru/about" target="_blank">MetaQuotes Software Corp.</a>&nbsp;начала свою деятельность в 2000 году как разработчик программного обеспечения для финансовых рынков. На настоящее время приобрела известность, как производитель&nbsp;<a href="http://www.teamwox.com/" target="_blank">TeamWox</a>&nbsp;— лучшей российской системы автоматизации управления СМБ-бизнесом.</li>
     </ul>

 </div>
 <!-- end container -->
</div>
<!-- end #work -->

<!-- begin #client -->
<div id="client" class="content has-bg bg-green" data-scrollview="true">
	<!-- begin content-bg -->
	<div class="content-bg">
		<img src="{{asset('/assets-landing/img/bg/bg-client.jpg')}}" alt="Client" />
	</div>
	<!-- end content-bg -->
	<!-- begin container -->
	<div class="container" data-animation="true" data-animation-type="fadeInUp">
		<h2 class="content-title">Отзывы наших партнеров</h2>
		<!-- begin carousel -->
		<div class="carousel testimonials testimonials-partners slide" data-ride="carousel" id="testimonials-partners">
			<!-- begin carousel-inner -->
			<div class="carousel-inner text-center">
				<!-- begin item -->
				<div class="item active">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						От сотрудничества у нас остаются только позитивные ощущения,<br />
						надеемся на дальнейший успех в совместной работе.
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">БПЦ Банковские Технологии</span></div>
				</div>
				<!-- end item -->
				<!-- begin item -->
				<div class="item">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						Нам приятно сотрудничать с Вами, надеемся, что и в дальнейшем<br />
						наши отношения будут плодотворными.
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">Data Integration Software</span></div>
				</div>
				<!-- end item -->
				<!-- begin item -->
				<div class="item">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						Надеемся на продолжение успешного сотрудничества<br />
						на благо наших общих интересов.
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">IBM</span></div>
				</div>
				<!-- end item -->
			</div>
			<!-- end carousel-inner -->
			<!-- begin carousel-indicators -->
			<ol class="carousel-indicators">
				<li data-target="#testimonials-partners" data-slide-to="0" class="active"></li>
				<li data-target="#testimonials-partners" data-slide-to="1" class=""></li>
				<li data-target="#testimonials-partners" data-slide-to="2" class=""></li>
			</ol>
			<!-- end carousel-indicators -->
		</div>
		<!-- end carousel -->
	</div>
	<!-- end containter -->
</div>
<!-- end #client -->




<!-- begin #news -->
<div id="news" class="content" data-scrollview="true">
	<!-- begin container -->
	<div class="container" data-animation="true" data-animation-type="fadeInDown">
		<h2 class="content-title">Новости</h2>
		<p class="content-desc">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
			sed bibendum turpis luctus eget
		</p>
		<!-- begin row -->
		<div class="row row-space-10">
			@foreach ($news as $value)
			<div class="newslist-container col-xs-6 col-sm-6 col-md-4" id="">
				<div class="newslist-block">

					<div class="image">
						<a href="{{ route('news',[$value->alias]) }}"><img src="{{ asset('/assets-landing/img/'.$value->picture_announce) }}"></a>
					</div>

					<h3 class="newslist-title"><a href="{{ route('news',[$value->alias]) }}">{{ $value->headline }}</a></h3>

					<div class="newslist-content">
						{{ str_limit($value->desc_announce,170) }}
					</div>

					<div class="row">
						<div class="col-xs-12"><div class="newslist-date"><small><i class="fa fa-calendar-o"></i> {{ $value->created_at->format('d F Y') }}</small></div></div>
					</div>

					<div class="row">
						<div class="col-xs-5">
							<a href="{{ route('news',[$value->alias]) }}" class="btn btn-theme btn-sm">Подробнее</a>
						</div>
					</div>

				</div>
			</div>
			@endforeach
		</div>
		<!-- end row -->
		<div class="text-center">
          {{ $news->fragment('news')->links() }}
      </div>
  </div>
  <!-- end container -->
</div>
<!-- end #news -->

<!-- begin #client -->
<div id="client" class="content has-bg bg-green" data-scrollview="true">
	<!-- begin content-bg -->
	<div class="content-bg">
		<img src="{{asset('/assets-landing/img/bg/bg-client.jpg')}}" alt="Client" />
	</div>
	<!-- end content-bg -->
	<!-- begin container -->
	<div class="container" data-animation="true" data-animation-type="fadeInUp">
		<h2 class="content-title">Our Client Testimonials</h2>
		<!-- begin carousel -->
		<div class="carousel testimonials slide" data-ride="carousel" id="testimonials">
			<!-- begin carousel-inner -->
			<div class="carousel-inner text-center">
				<!-- begin item -->
				<div class="item active">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce viverra, nulla ut interdum fringilla,<br />
						urna massa cursus lectus, eget rutrum lectus neque non ex.
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">Mark Doe</span>, Designer</div>
				</div>
				<!-- end item -->
				<!-- begin item -->
				<div class="item">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						Donec cursus ligula at ante vulputate laoreet. Nulla egestas sit amet lorem non bibendum.<br />
						Nulla eget risus velit. Pellentesque tincidunt velit vitae tincidunt finibus.
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">Joe Smith</span>, Developer</div>
				</div>
				<!-- end item -->
				<!-- begin item -->
				<div class="item">
					<blockquote>
						<i class="fa fa-quote-left"></i>
						Sed tincidunt quis est sed ultrices. Sed feugiat auctor ipsum, sit amet accumsan elit vestibulum<br />
						fringilla. In sollicitudin ac ligula eget vestibulum.
						<i class="fa fa-quote-right"></i>
					</blockquote>
					<div class="name"> — <span class="text-theme">Linda Adams</span>, Programmer</div>
				</div>
				<!-- end item -->
			</div>
			<!-- end carousel-inner -->
			<!-- begin carousel-indicators -->
			<ol class="carousel-indicators">
				<li data-target="#testimonials" data-slide-to="0" class="active"></li>
				<li data-target="#testimonials" data-slide-to="1" class=""></li>
				<li data-target="#testimonials" data-slide-to="2" class=""></li>
			</ol>
			<!-- end carousel-indicators -->
		</div>
		<!-- end carousel -->
	</div>
	<!-- end containter -->
</div>
<!-- end #client -->



<!-- begin #contact -->
<div id="contact" class="content bg-silver-lighter" data-scrollview="true">
	<!-- begin container -->
	<div class="container">
		<h2 class="content-title">Контакты</h2>
		<p class="content-desc">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
			sed bibendum turpis luctus eget
		</p>
		<!-- begin row -->
		<div class="row">

            <!-- begin col-6 -->
            <div class="col-md-6" data-animation="true" data-animation-type="fadeInLeft">
                <h3>Наши реквизиты</h3>
                <table class="tableinfooter">
                  <tbody>
                      <tr>
                         <td>Полное наименование</td>
                         <td></td>
                         <td>Общество с ограниченной ответственностью «Софтваре Провайдэр»</td>
                     </tr>
                     <tr>
                         <td>Полное наименование на английском языке</td>
                         <td></td>
                         <td>«Software Provider» Ltd</td>
                     </tr>
                     <tr>
                         <td>Юридический адрес</td>
                         <td></td>
                         <td>301246, Тульская область, г. Щекино, Ясенковский проезд, д. 9</td>
                     </tr>
                     <tr>
                         <td>Адрес в интернете</td>
                         <td></td>
                         <td class="top"><a href="http://www.software-provider.ru/" target="_blank">http://www.software-provider.ru/</a></td>
                     </tr>
                     <tr>
                         <td>Электронный адрес<br>Телефон<br>Контактный телефон московского представительства</td>
                         <td></td>
                         <td><a href="mailto:support@software-provider.ru">support@software-provider.ru</a><br>+7-980-720-75-54<br>+7-917-505-14-24</td>
                     </tr>
                     <tr>
                         <td>ИНН КПП</td>
                         <td></td>
                         <td>7118503467 711801001</td>
                     </tr>
                     <tr>
                         <td>Банковские реквизиты</td>
                         <td></td>
                         <td>Московский РФ АО «Россельхозбанк»<br>
                            г. Москва БИК 044525430<br>
                            к/сч 30101810045250000430<br>
                            р/сч 40702810163290000068
                        </td>
                    </tr>
                    <tr>
                     <td>Регистрационные данные</td>
                     <td></td>
                     <td>ОГРН 1107154014373<br>ПФР 081-027-015160</td>
                 </tr>
             </tbody>
         </table>
     </div>
     <!-- end col-6 -->
     <!-- begin col-6 -->
     <div class="col-md-6 form-col" data-animation="true" data-animation-type="fadeInRight">
       <h3>Пишите нам</h3>
       <form class="form-horizontal" action="{{ route('landingHome') }}" method="POST">

          <div class="form-group">
             <div class="col-md-9">
                <label for="name" class="control-label">Ваше имя <span class="text-theme">*</span></label>
                <input id="name" type="text" class="form-control" name="name" />
            </div>
        </div>

        <div class="form-group">
         <div class="col-md-9">
            <label for="email" class="control-label">Ваш E-mail <span class="text-theme">*</span></label>
            <input id="email" type="text" class="form-control" name="email" />
        </div>
    </div>

    <div class="form-group">
     <div class="col-md-9">
        <label for="textarea" class="control-label">Сообщение <span class="text-theme">*</span></label>
        <textarea id="textarea" class="form-control" rows="10" name="text"></textarea>
    </div>
</div>

<div class="form-group">
 <div class="col-md-9 text-left">
    <label class="control-label"></label>
    <button type="submit" class="btn btn-theme btn-block">Отправить сообщение</button>
</div>
</div>
{{ csrf_field() }} 
</form>
@if (session('status'))
<div class="alert alert-success"> {{ session('status') }} </div>
@endif
@if (count($errors))
<div class="alert alert-danger"> 
 <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
</div>
<!-- end col-6 -->

</div>
<!-- end row -->
</div>
<!-- end container -->
</div>
<!-- end #contact -->
@endsection