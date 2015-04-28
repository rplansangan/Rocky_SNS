<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
	<div class="container-fluid">
		<div class=" land-main-cont">
			<div class="row">
				<div class="page-header">
					<h2>{{ $form_title }}</h2>
				</div>
			</div>
			<div class="row">
				<form method="POST" action="{{ $form_route }}" class="form-horizontal" role="form" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.prof_pic') }}</label>
						<div class='col-sm-8'>
							<input type='file' name="userfile" class="custom-file-input" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-3 view-image-here"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.name') }}</label>
						<div class="col-sm-4">
							<input type="text" name="first_name" class="form-control" placeholder="{{ trans('profile.placeholders.prof_details.first_name') }}" @if($form_details->first_name) value="{{{ $form_details->first_name }}}" @endif >
						</div>
						<div class="col-sm-4">
							<input type="text" name="last_name" class="form-control" placeholder="{{ trans('profile.placeholders.prof_details.last_name') }}" @if($form_details->last_name) value="{{{ $form_details->last_name }}}" @endif >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.bday') }}</label>
						<div class='col-sm-8'>
							<input type="date" class="form-control" id="birth_date" name="birth_date" required @if($form_details->birth_date) value="{{{ $form_details->birth_date }}}" @endif >
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-3 control-label">E-mail Address:</label>
						<div class="col-sm-4">
							<input type="email" class="form-control" name="email_address" placeholder="Email Address" required @if($form_details->email_address) value="{{{ $form_details->email_address }}}" @endif >
						</div>
						<div class="col-sm-4">
							<input type="email" class="form-control" name="email_address_confirmation" placeholder="Confirm Email Address" required @if($form_details->email_address) value="{{{ $form_details->email_address }}}" @endif >
						</div>
					</div>-->
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.gender') }}</label>
						<div class="radio col-sm-2">
							<label>
								<input type="radio" name="gender" value="M" @if($form_details->gender == 'M') checked @endif disabled>
								{{ trans('profile.labels.prof_details.gender.male') }}
							</label>
						</div>
						<div class="radio col-sm-2">
							<label>
								<input type="radio" name="gender" value="F" @if($form_details->gender == 'F') checked @endif disabled>
								{{ trans('profile.labels.prof_details.gender.female') }}
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.addr') }}</label>
							<div class="col-sm-8">
								<div class="col-lg-12">
									<textarea class="form-control" name="address_line1" placeholder="{{ trans('profile.placeholders.prof_details.addr_l1') }}" rows="3">{{{ $form_details->address_line1 }}}</textarea>
								</div>
							</div>
						</div>
						<br clear="all">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-3">
								<div class="col-lg-12">
									<textarea class="form-control" name="address_line2" placeholder="{{ trans('profile.placeholders.prof_details.addr_l2') }}" rows="3">{{{ $form_details->address_line2 }}}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.city') }}</label>
						<div class='col-sm-8'>
							<input type='text' name="city" class="form-control" value="{{{ $form_details->city }}}"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.zip') }}</label>
						<div class='col-sm-8'>
							<input type='text' name="zip" class="form-control" value="{{{ $form_details->zip }}}"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.state') }}</label>
						<div class='col-sm-8'>
							<input type='text' name="state" class="form-control" value="{{{ $form_details->state }}}"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.country') }}</label>
						<div class='col-sm-8'>
							<select name="country" class="form-control">
								<option value='ad' data-title="Andorra">Andorra</option>
								<option value='ae' data-title="United Arab Emirates">United Arab Emirates</option>
								<option value='af' data-title="Afghanistan">Afghanistan</option>
								<option value='ag' data-title="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value='ai' data-title="Anguilla">Anguilla</option>
								<option value='al' data-title="Albania">Albania</option>
								<option value='am' data-title="Armenia">Armenia</option>
								<option value='an' data-title="Netherlands Antilles">Netherlands Antilles</option>
								<option value='ao' data-title="Angola">Angola</option>
								<option value='aq' data-title="Antarctica">Antarctica</option>
								<option value='ar' data-title="Argentina">Argentina</option>
								<option value='as' data-title="American Samoa">American Samoa</option>
								<option value='at' data-title="Austria">Austria</option>
								<option value='au' data-title="Australia">Australia</option>
								<option value='aw' data-title="Aruba">Aruba</option>
								<option value='ax' data-title="Aland Islands">Aland Islands</option>
								<option value='az' data-title="Azerbaijan">Azerbaijan</option>
								<option value='ba' data-title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								<option value='bb' data-title="Barbados">Barbados</option>
								<option value='bd' data-title="Bangladesh">Bangladesh</option>
								<option value='be' data-title="Belgium">Belgium</option>
								<option value='bf' data-title="Burkina Faso">Burkina Faso</option>
								<option value='bg' data-title="Bulgaria">Bulgaria</option>
								<option value='bh' data-title="Bahrain">Bahrain</option>
								<option value='bi' data-title="Burundi">Burundi</option>
								<option value='bj' data-title="Benin">Benin</option>
								<option value='bm' data-title="Bermuda">Bermuda</option>
								<option value='bn' data-title="Brunei Darussalam">Brunei Darussalam</option>
								<option value='bo' data-title="Bolivia">Bolivia</option>
								<option value='br' data-title="Brazil">Brazil</option>
								<option value='bs' data-title="Bahamas">Bahamas</option>
								<option value='bt' data-title="Bhutan">Bhutan</option>
								<option value='bv' data-title="Bouvet Island">Bouvet Island</option>
								<option value='bw' data-title="Botswana">Botswana</option>
								<option value='by' data-title="Belarus">Belarus</option>
								<option value='bz' data-title="Belize">Belize</option>
								<option value='ca' data-title="Canada">Canada</option>
								<option value='cc' data-title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
								<option value='cd' data-title="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
								<option value='cf' data-title="Central African Republic">Central African Republic</option>
								<option value='cg' data-title="Congo">Congo</option>
								<option value='ch' data-title="Switzerland">Switzerland</option>
								<option value='ci' data-title="Cote D'Ivoire (Ivory Coast)">Cote D'Ivoire (Ivory Coast)</option>
								<option value='ck' data-title="Cook Islands">Cook Islands</option>
								<option value='cl' data-title="Chile">Chile</option>
								<option value='cm' data-title="Cameroon">Cameroon</option>
								<option value='cn' data-title="China">China</option>
								<option value='co' data-title="Colombia">Colombia</option>
								<option value='cr' data-title="Costa Rica">Costa Rica</option>
								<option value='cs' data-title="Serbia and Montenegro">Serbia and Montenegro</option>
								<option value='cu' data-title="Cuba">Cuba</option>
								<option value='cv' data-title="Cape Verde">Cape Verde</option>
								<option value='cx' data-title="Christmas Island">Christmas Island</option>
								<option value='cy' data-title="Cyprus">Cyprus</option>
								<option value='cz' data-title="Czech Republic">Czech Republic</option>
								<option value='de' data-title="Germany">Germany</option>
								<option value='dj' data-title="Djibouti">Djibouti</option>
								<option value='dk' data-title="Denmark">Denmark</option>
								<option value='dm' data-title="Dominica">Dominica</option>
								<option value='do' data-title="Dominican Republic">Dominican Republic</option>
								<option value='dz' data-title="Algeria">Algeria</option>
								<option value='ec' data-title="Ecuador">Ecuador</option>
								<option value='ee' data-title="Estonia">Estonia</option>
								<option value='eg' data-title="Egypt">Egypt</option>
								<option value='eh' data-title="Western Sahara">Western Sahara</option>
								<option value='er' data-title="Eritrea">Eritrea</option>
								<option value='es' data-title="Spain">Spain</option>
								<option value='et' data-title="Ethiopia">Ethiopia</option>
								<option value='fi' data-title="Finland">Finland</option>
								<option value='fj' data-title="Fiji">Fiji</option>
								<option value='fk' data-title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
								<option value='fm' data-title="Federated States of Micronesia">Federated States of Micronesia</option>
								<option value='fo' data-title="Faroe Islands">Faroe Islands</option>
								<option value='fr' data-title="France">France</option>
								<option value='fx' data-title="France, Metropolitan">France, Metropolitan</option>
								<option value='ga' data-title="Gabon">Gabon</option>
								<option value='gb' data-title="Great Britain (UK)">Great Britain (UK)</option>
								<option value='gd' data-title="Grenada">Grenada</option>
								<option value='ge' data-title="Georgia">Georgia</option>
								<option value='gf' data-title="French Guiana">French Guiana</option>
								<option value='gh' data-title="Ghana">Ghana</option>
								<option value='gi' data-title="Gibraltar">Gibraltar</option>
								<option value='gl' data-title="Greenland">Greenland</option>
								<option value='gm' data-title="Gambia">Gambia</option>
								<option value='gn' data-title="Guinea">Guinea</option>
								<option value='gp' data-title="Guadeloupe">Guadeloupe</option>
								<option value='gq' data-title="Equatorial Guinea">Equatorial Guinea</option>
								<option value='gr' data-title="Greece">Greece</option>
								<option value='gs' data-title="S. Georgia and S. Sandwich Islands">S. Georgia and S. Sandwich Islands</option>
								<option value='gt' data-title="Guatemala">Guatemala</option>
								<option value='gu' data-title="Guam">Guam</option>
								<option value='gw' data-title="Guinea-Bissau">Guinea-Bissau</option>
								<option value='gy' data-title="Guyana">Guyana</option>
								<option value='hk' data-title="Hong Kong">Hong Kong</option>
								<option value='hm' data-title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
								<option value='hn' data-title="Honduras">Honduras</option>
								<option value='hr' data-title="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
								<option value='ht' data-title="Haiti">Haiti</option>
								<option value='hu' data-title="Hungary">Hungary</option>
								<option value='id' data-title="Indonesia">Indonesia</option>
								<option value='ie' data-title="Ireland">Ireland</option>
								<option value='il' data-title="Israel">Israel</option>
								<option value='in' data-title="India">India</option>
								<option value='io' data-title="British Indian Ocean Territory">British Indian Ocean Territory</option>
								<option value='iq' data-title="Iraq">Iraq</option>
								<option value='ir' data-title="Iran">Iran</option>
								<option value='is' data-title="Iceland">Iceland</option>
								<option value='it' data-title="Italy">Italy</option>
								<option value='jm' data-title="Jamaica">Jamaica</option>
								<option value='jo' data-title="Jordan">Jordan</option>
								<option value='jp' data-title="Japan">Japan</option>
								<option value='ke' data-title="Kenya">Kenya</option>
								<option value='kg' data-title="Kyrgyzstan">Kyrgyzstan</option>
								<option value='kh' data-title="Cambodia">Cambodia</option>
								<option value='ki' data-title="Kiribati">Kiribati</option>
								<option value='km' data-title="Comoros">Comoros</option>
								<option value='kn' data-title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value='kp' data-title="Korea (North)">Korea (North)</option>
								<option value='kr' data-title="Korea (South)">Korea (South)</option>
								<option value='kw' data-title="Kuwait">Kuwait</option>
								<option value='ky' data-title="Cayman Islands">Cayman Islands</option>
								<option value='kz' data-title="Kazakhstan">Kazakhstan</option>
								<option value='la' data-title="Laos">Laos</option>
								<option value='lb' data-title="Lebanon">Lebanon</option>
								<option value='lc' data-title="Saint Lucia">Saint Lucia</option>
								<option value='li' data-title="Liechtenstein">Liechtenstein</option>
								<option value='lk' data-title="Sri Lanka">Sri Lanka</option>
								<option value='lr' data-title="Liberia">Liberia</option>
								<option value='ls' data-title="Lesotho">Lesotho</option>
								<option value='lt' data-title="Lithuania">Lithuania</option>
								<option value='lu' data-title="Luxembourg">Luxembourg</option>
								<option value='lv' data-title="Latvia">Latvia</option>
								<option value='ly' data-title="Libya">Libya</option>
								<option value='ma' data-title="Morocco">Morocco</option>
								<option value='mc' data-title="Monaco">Monaco</option>
								<option value='md' data-title="Moldova">Moldova</option>
								<option value='mg' data-title="Madagascar">Madagascar</option>
								<option value='mh' data-title="Marshall Islands">Marshall Islands</option>
								<option value='mk' data-title="Macedonia">Macedonia</option>
								<option value='ml' data-title="Mali">Mali</option>
								<option value='mm' data-title="Myanmar">Myanmar</option>
								<option value='mn' data-title="Mongolia">Mongolia</option>
								<option value='mo' data-title="Macao">Macao</option>
								<option value='mp' data-title="Northern Mariana Islands">Northern Mariana Islands</option>
								<option value='mq' data-title="Martinique">Martinique</option>
								<option value='mr' data-title="Mauritania">Mauritania</option>
								<option value='ms' data-title="Montserrat">Montserrat</option>
								<option value='mt' data-title="Malta">Malta</option>
								<option value='mu' data-title="Mauritius">Mauritius</option>
								<option value='mv' data-title="Maldives">Maldives</option>
								<option value='mw' data-title="Malawi">Malawi</option>
								<option value='mx' data-title="Mexico">Mexico</option>
								<option value='my' data-title="Malaysia">Malaysia</option>
								<option value='mz' data-title="Mozambique">Mozambique</option>
								<option value='na' data-title="Namibia">Namibia</option>
								<option value='nc' data-title="New Caledonia">New Caledonia</option>
								<option value='ne' data-title="Niger">Niger</option>
								<option value='nf' data-title="Norfolk Island">Norfolk Island</option>
								<option value='ng' data-title="Nigeria">Nigeria</option>
								<option value='ni' data-title="Nicaragua">Nicaragua</option>
								<option value='nl' data-title="Netherlands">Netherlands</option>
								<option value='no' data-title="Norway">Norway</option>
								<option value='np' data-title="Nepal">Nepal</option>
								<option value='nr' data-title="Nauru">Nauru</option>
								<option value='nu' data-title="Niue">Niue</option>
								<option value='nz' data-title="New Zealand (Aotearoa)">New Zealand (Aotearoa)</option>
								<option value='om' data-title="Oman">Oman</option>
								<option value='pa' data-title="Panama">Panama</option>
								<option value='pe' data-title="Peru">Peru</option>
								<option value='pf' data-title="French Polynesia">French Polynesia</option>
								<option value='pg' data-title="Papua New Guinea">Papua New Guinea</option>
								<option value='ph' data-title="Philippines" selected="selected">Philippines</option>
								<option value='pk' data-title="Pakistan">Pakistan</option>
								<option value='pl' data-title="Poland">Poland</option>
								<option value='pm' data-title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
								<option value='pn' data-title="Pitcairn">Pitcairn</option>
								<option value='pr' data-title="Puerto Rico">Puerto Rico</option>
								<option value='ps' data-title="Palestinian Territory">Palestinian Territory</option>
								<option value='pt' data-title="Portugal">Portugal</option>
								<option value='pw' data-title="Palau">Palau</option>
								<option value='py' data-title="Paraguay">Paraguay</option>
								<option value='qa' data-title="Qatar">Qatar</option>
								<option value='re' data-title="Reunion">Reunion</option>
								<option value='ro' data-title="Romania">Romania</option>
								<option value='ru' data-title="Russian Federation">Russian Federation</option>
								<option value='rw' data-title="Rwanda">Rwanda</option>
								<option value='sa' data-title="Saudi Arabia">Saudi Arabia</option>
								<option value='sb' data-title="Solomon Islands">Solomon Islands</option>
								<option value='sc' data-title="Seychelles">Seychelles</option>
								<option value='sd' data-title="Sudan">Sudan</option>
								<option value='se' data-title="Sweden">Sweden</option>
								<option value='sg' data-title="Singapore">Singapore</option>
								<option value='sh' data-title="Saint Helena">Saint Helena</option>
								<option value='si' data-title="Slovenia">Slovenia</option>
								<option value='sj' data-title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
								<option value='sk' data-title="Slovakia">Slovakia</option>
								<option value='sl' data-title="Sierra Leone">Sierra Leone</option>
								<option value='sm' data-title="San Marino">San Marino</option>
								<option value='sn' data-title="Senegal">Senegal</option>
								<option value='so' data-title="Somalia">Somalia</option>
								<option value='sr' data-title="Suriname">Suriname</option>
								<option value='st' data-title="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value='su' data-title="USSR (former)">USSR (former)</option>
								<option value='sv' data-title="El Salvador">El Salvador</option>
								<option value='sy' data-title="Syria">Syria</option>
								<option value='sz' data-title="Swaziland">Swaziland</option>
								<option value='tc' data-title="Turks and Caicos Islands">Turks and Caicos Islands</option>
								<option value='td' data-title="Chad">Chad</option>
								<option value='tf' data-title="French Southern Territories">French Southern Territories</option>
								<option value='tg' data-title="Togo">Togo</option>
								<option value='th' data-title="Thailand">Thailand</option>
								<option value='tj' data-title="Tajikistan">Tajikistan</option>
								<option value='tk' data-title="Tokelau">Tokelau</option>
								<option value='tl' data-title="Timor-Leste">Timor-Leste</option>
								<option value='tm' data-title="Turkmenistan">Turkmenistan</option>
								<option value='tn' data-title="Tunisia">Tunisia</option>
								<option value='to' data-title="Tonga">Tonga</option>
								<option value='tp' data-title="East Timor">East Timor</option>
								<option value='tr' data-title="Turkey">Turkey</option>
								<option value='tt' data-title="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value='tv' data-title="Tuvalu">Tuvalu</option>
								<option value='tw' data-title="Taiwan">Taiwan</option>
								<option value='tz' data-title="Tanzania">Tanzania</option>
								<option value='ua' data-title="Ukraine">Ukraine</option>
								<option value='ug' data-title="Uganda">Uganda</option>
								<option value='uk' data-title="United Kingdom">United Kingdom</option>
								<option value='um' data-title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
								<option value='us' data-title="United States">United States</option>
								<option value='uy' data-title="Uruguay">Uruguay</option>
								<option value='uz' data-title="Uzbekistan">Uzbekistan</option>
								<option value='va' data-title="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
								<option value='vc' data-title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
								<option value='ve' data-title="Venezuela">Venezuela</option>
								<option value='vg' data-title="Virgin Islands (British)">Virgin Islands (British)</option>
								<option value='vi' data-title="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
								<option value='vn' data-title="Viet Nam">Viet Nam</option>
								<option value='vu' data-title="Vanuatu">Vanuatu</option>
								<option value='wf' data-title="Wallis and Futuna">Wallis and Futuna</option>
								<option value='ws' data-title="Samoa">Samoa</option>
								<option value='ye' data-title="Yemen">Yemen</option>
								<option value='yt' data-title="Mayotte">Mayotte</option>
								<option value='yu' data-title="Yugoslavia (former)">Yugoslavia (former)</option>
								<option value='za' data-title="South Africa">South Africa</option>
								<option value='zm' data-title="Zambia">Zambia</option>
								<option value='zr' data-title="Zaire (former)">Zaire (former)</option>
								<option value='zw' data-title="Zimbabwe">Zimbabwe</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.area_code') }}</label>
						<div class='col-sm-2'>
							<select name="phone_area_code" class="form-control">
								<option>123</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.phone_number') }}</label>
						<div class='col-sm-2'>
							<select name="phone_country_code" class="form-control">
								<option>63</option>
							</select>
						</div>
						<div class='col-sm-6'>
							<input type='text' name="phone_number" placeholder="Phone Number" class="form-control" value="{{{ $form_details->phone_number }}}"/>
						</div>
					</div>
					

					<div class="form-group">
						<div class='col-sm-8 col-sm-offset-3 text-right'>
							<input type='submit' class="btn" value="{{ trans('profile.buttons.prof_details.update') }}"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>