<template>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-1">
				<div class="team-member wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay=".3s" style="visibility: visible; animation-duration: 500ms; animation-delay: 0.3s; animation-name: fadeInLeft;" v-if="contact.picture">
					<div class="team-img">
						<img :src="contact.picture" class="img-responsive img-thumbnail" alt="">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="team-member wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay=".5s" style="visibility: visible; animation-duration: 500ms; animation-delay: 0.5s; animation-name: fadeInLeft;">
					<div class="block">
						<ol class="breadcrumb">
							<li>
								<a href="index.html">
									<i class="ion-ios-home"></i> Contatos
								</a>
							</li>
							<li class="active"> {{ title }} </li>
						</ol>
					</div>
					<br>

					<div id="team_content">
						<h1 class="text-uppercase">{{ contact.meta.name }}</h1>
						<p>{{ contact.meta.designation }}</p>
					</div>

					<span style="width: 30px; height:3px; display: block; background: orange;"></span>
					<br>
					<!-- DADOS -->
					<table id="contact-info" class="table table-condensed">
						<tbody>
							<tr v-if="contact.meta.whatsapp">
								<td class="text-center icon">
									<i class="fa fa-whatsapp" aria-hidden="true"></i>
								</td>
								<td>
									<span><a :href="'https://api.whatsapp.com/send?phone=' + contact.meta.whatsapp + '&text=' + this.whatsMessage" target="_new">{{ contact.meta.whatsapp }}</a></span>
								</td>
							</tr>
							<tr v-if="contact.meta.phone">
								<td class="text-center icon">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</td>
								<td>
									<span><a :href="'tel:' + contact.meta.phone" target="_new">{{ contact.meta.phone }}</a></span>
								</td>
							</tr>
							<tr v-if="contact.meta.email">
								<td class="text-center icon">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</td>
								<td>
									<a :href="'mailto:'+contact.meta.email">{{ contact.meta.email }}</a>
								</td>
							</tr>
							<tr v-if="contact.meta.address">
								<td class="text-center icon">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</td>
								<td>
									<span> <div v-html="contact.meta.address"></div></span>
								</td>
							</tr>
							<tr v-if="contact.meta.facebook">
								<td class="text-center icon">
									<i class="fa fa-facebook-official" aria-hidden="true"></i>
								</td>
								<td>
									<span><a :href="contact.meta.facebook" target="_new">{{ contact.meta.facebook }}</a></span>
								</td>
							</tr>
							<tr v-if="contact.meta.instagram">
								<td class="text-center icon">
									<i class="fa fa-instagram" aria-hidden="true"></i>
								</td>
								<td>
									<span><a :href="contact.meta.instagram" target="_new">{{ contact.meta.instagram }}</a></span>
								</td>
							</tr>
							<tr v-if="contact.meta.website">
								<td class="text-center icon">
									<i class="fa fa-home" aria-hidden="true"></i>
								</td>
								<td>
									<a :href="contact.meta.website">{{ contact.meta.website }}</a>
								</td>
							</tr>
						</tbody>
					</table>
					<hr>
					<a class="btn btn-sm btn-primary text-uppercase" href="?download">
						<i class="fa fa-save"></i> Baixar V-card
					</a>
					<a href="#" class="btn btn-sm btn-primary text-uppercase" onclick="alert('Indisponível!');">
						<i class="fa fa-save"></i> Baixar CSV
					</a>
				</div>
			</div>
		</div>
		<div class="row">&nbsp;</div>
	</div>

</template>

<style type="text/css" media="screen">
#contact-info {
	border: none;
	font-size: 14.5px;
}

#contact-info * {
	border: none;
}

#contact-info a {
	text-decoration: none;
	color: initial;
	font-size: 18px;
}
#contact-info a:hover {
	text-decoration: none;
	color: #de5906;
}

#contact-info .icon i {
	font-size: 20px;
	line-height: 28px;
	vertical-align: top;
}

#team {
	margin-top: 0;
	margin-bottom: 30px;
}

#team .team-member {
	margin-top: -40px;
}

#team .team-img {}

	#team .breadcrumb {
		background: none;
		font-size: 16px;
		padding: 8px 0;
	}

	#team .breadcrumb .active {
		color: #fff;
	}

	#team .breadcrumb li a {
		color: #fff;
	}
	</style>

	<script type="text/javascript">
	import axios from 'axios'
	import _ from 'lodash'
	import vcard from 'vcard-generator'

	export default {
		data: function(){
			return {
				debug: '',
				title: '',
				contact: {
					picture: 'http://techblog.centro.net/assets/2016-01-28_patrick-grady_loading-e10721d0da975266476073531d9bd38c.gif',
					meta: {}
				}
			}
		},
		computed: {
			slug(){
				var slug = location.pathname.split('/');
				slug = slug[slug.length - 2];
				return slug;
			},
			whatsMessage: function (){
				var message = 'Olá. Gostaria de solicitar contato.'
				return encodeURI(message);
			}
		},
		mounted () {

			var apiUrl = 'http://sparkag.com.br/wp-json/wp/v2/'
			var contactEndpoit = apiUrl + 'contact/'

			var self = this

			axios.get( contactEndpoit, {
				params: {
					slug: self.slug
				}
			}).then(function(resp){
				self.debug = resp.data[0]

				self.title					= resp.data[0].title.rendered
				self.contact.meta 	= resp.data[0].meta

				var contact = resp.data[0]

				if( contact ){
					axios.get( contact['_links']['wp:featuredmedia'][0].href ).then(function (r) {
						self.contact.picture = r.data.source_url
					})
				}

			})

		},
		methods: {
			downloadVcard () {

				var self = this

				const vcardContent = vcard({
					name: {
						familyName: self.contact.name,
						givenName: self.contact.name,
						middleName: '',
						prefix: '',
						suffix: '',
					},
					formattedNames: [{
						text: self.contact.resume,
					}],
					nicknames: [{
						text: 'Phil',
					}],
					extraName: {
						maidenName: 'MaidenName',
						phoneticFirstName: 'PhoneticFirstName',
						phoneticMiddleName: 'PhoneticMiddleName',
						phoneticLastName: 'PhoneticLastName',

						pronunciationFirstName: 'PronunciationFirstName',
						pronunciationMiddleName: 'PronunciationMiddleName',
						pronunciationLastName: 'PronunciationLastName',
					}
				});

				alert(vcardContent);

			}
		}
	}
	</script>
