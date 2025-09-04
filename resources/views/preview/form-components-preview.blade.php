<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MLBRGN form components preview page</title>
        <link rel="stylesheet" href="{{ package_asset('preview.css') }}">
        <link rel="stylesheet" href="{{ package_asset('main.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="{{ package_asset('preview.js') }}"></script>
    </head>
    <body>
        <x-form::local-package-badge/>
        <div class="container-fluid p-0">
            <div class="container-md py-1 py-md-3">

                <h1>Mlbrgn form components preview page</h1>

                <h2>Section links:</h2>
                <ul id="section-links">
                    <li>
                        <a href="#form-overview">Overview</a>
                    </li>
                    <li>
                        <a href="#form-controls">Form controls</a>
                    </li>
                    <li>
                        <a href="#form-select">Select</a>
                    </li>
                    <li>
                        <a href="#form-checks-and-radios">Checks and radios</a>
                    </li>
                    <li>
                        <a href="#form-range">Range</a>
                    </li>
                    <li>
                        <a href="#form-input-group">Input group</a>
                    </li>
                    <li>
                        <a href="#form-floating-label">Floating label</a>
                    </li>
                    <li>
                        <a href="#form-layout">Layout</a>
                    </li>
                    <li>
                        <a href="#form-validation">Validation</a>
                    </li>
                    <li>
                        <a href="#form-custom-tests">Custom tests</a>
                    </li>
                </ul>

                <h2 id="form-overview">Overview</h2>

                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/overview/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

                <x-form-form>
                    <div class="mb-3">
                        <x-form-input id="exampleInputEmail1"  label="Email address" autocomplete="username">
                            @slot('help')
                                We'll never share your email with anyone else.
                            @endslot
                        </x-form-input>
                    </div>
                    <div class="mb-3">
                        <x-form-input type="password" id="exampleInputPassword" label="Password" autocomplete="new-password"/>
                    </div>
                    <x-form-checkbox class="mb-3" id="exampleCheck1" label="Check me out"/>
                    <x-form-submit class="mt-3">Submit</x-form-submit>
                </x-form-form>

                <h3>Form text</h3>
                <x-form-form>
                    <x-form-input id="inputUsername" hidden autocomplete="username"/>
                    <x-form-input class="mb-3" type="password" id="inputPassword1"  label="Password" autocomplete="new-password" class-help-text="text-danger">
                        @slot('help')
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        @endslot
                    </x-form-input>
                    <x-form-input type="password" id="inputPassword2"  label="Password with help text containing html" autocomplete="new-password">
                        @slot('help')
                            Your <strong>password</strong> must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        @endslot
                    </x-form-input>
                </x-form-form>

                <h3>Inline text</h3>

                <x-form-form>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label class="col-form-label">Password</label>
                        </div>
                        <div class="col-auto">
                            <x-form-input id="username2" autocomplete="username" hidden/>
                            <x-form-input type="password" id="inputPassword4"  autocomplete="new-password"/>
                        </div>
                        <div class="col-auto">
                            <x-form-text>
                                Must be 8-20 characters long.
                            </x-form-text>
                        </div>
                    </div>
                </x-form-form>

                <h3>Disabled forms</h3>
                <x-form-form>
                    <fieldset disabled>
                        <legend>Disabled fieldset example</legend>
                        <div class="mb-3">
                            <x-form-input id="disabledTextInput"  placeholder="Disabled input" label="Disabled input"/>
                        </div>
                        <div class="mb-3">
                            <x-form-select id="disabledSelect" label="Disabled select menu">
                                <option>Disabled select</option>
                                @slot('help')
                                    Just to <strong>see</strong> if help text appears and has id and is referred to by aria-describedby.
                                    <p class="text-primary">Just a test to see if text is displayed in primary color here</p>
                                @endslot
                            </x-form-select>
                        </div>
                        <div class="mb-3">
                            <x-form-checkbox id="disabledFieldsetCheck" disabled label="Can't check this"/>
                        </div>
                        <x-form-submit class="btn-preview-primary">Submit</x-form-submit>
                    </fieldset>
                </x-form-form>


                <h2 id="form-controls">Form controls</h2>

                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/form-control/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

                <h3>Example</h3>

                <div class="mb-3">
                    <x-form-input type="email" id="exampleFormControlInput1" label="Email address" placeholder="name@example.com" required/>
                </div>
                <div class="mb-3">
                    <x-form-textarea id="exampleFormControlTextarea1" label="Example textarea" rows="3"></x-form-textarea>
                </div>

                <h3>Sizing</h3>

                <x-form-input class="form-control-lg mb-3" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example"/>
                <x-form-input class="mb-3" type="text" placeholder="Default input" aria-label="default input example"/>
                <x-form-input class="form-control-sm mb-3" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example"/>

                <h3>Form text</h3>

                <x-form-form>
                    <x-form-input id="username3"  autocomplete="username" hidden/>
                    <x-form-input type="password" id="inputPassword5" label="password" autocomplete="new-password">
                    @slot('help')
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                    @endslot
                    </x-form-input>
                </x-form-form>

                <h3>Disabled</h3>

                <x-form-input class="mb-3" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled/>
                <x-form-input class="mb-3" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly/>

                <h3>Readonly</h3>

                <x-form-input type="text" value="Readonly input here..." aria-label="readonly input example" readonly/>

                <h3>Readonly plain text </h3>

                <x-form-form>
                    <x-form-input readonly class="form-control-plaintext mb-3" id="staticEmail" label="Email" value="email@example.com" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="username"/>
                    <x-form-input type="password" class="mb-3" label="Password" id="inputPassword6" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="new-password"/>
                </x-form-form>

                <x-form-form class="row g-3">
                    <div class="col-auto">
                        <x-form-input readonly class="form-control-plaintext" label="Email" id="staticEmail2" value="email@example.com" class-label="visually-hidden" autocomplete="username"/>
                    </div>
                    <div class="col-auto">
                        <x-form-input type="password" id="inputPassword7" label="Password" placeholder="Password" class-label="visually-hidden" autocomplete="new-password"/>
                    </div>
                    <div class="col-auto">
                        <x-form-submit class="btn-preview-primary mb-3">Confirm identity</x-form-submit>
                    </div>
                </x-form-form>

                <h3>File inputs</h3>

                <div class="mb-3">
                    <x-form-input type="file" id="formFile" label="Default file input example"/>
                </div>
                <div class="mb-3">
                    <x-form-input type="file" id="formFileMultiple" multiple label="Multiple files input example"/>
                </div>
                <div class="mb-3">
                    <x-form-input type="file" id="formFileDisabled" disabled label="Disabled file input example"/>
                </div>
                <div class="mb-3">
                    <x-form-input class="form-control-sm" id="formFileSm" type="file" label="Small file input example"/>
                </div>
                <div class="mb-3">
                    <x-form-input class="form-control-lg" id="formFileLg" type="file" label="Large file input example"/>
                </div>

                <h3>Colors</h3>

                <x-form-input type="color" class="form-control-color mb-3" id="exampleColorInput" value="#563d7c" label="Color picker" title="Choose your color"/>

                <h3>Datalist</h3>

                <x-form-input list="datalistOptions" id="exampleDataList" label="Datalist example" placeholder="Type to search..."/>
                <datalist id="datalistOptions">
                    <option value="San Francisco">San Francisco</option>
                    <option value="New York">New York</option>
                    <option value="Seattle">Seattle</option>
                    <option value="Los Angeles">Los Angeles</option>
                    <option value="Chicago">Chicago</option>
                </datalist>

                <h2 id="form-select">Select</h2>
                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/select/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

                <h3>Default</h3>

                <x-form-select class="mb-3" label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </x-form-select>

                <h3>Sizing</h3>

                <x-form-select class="form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </x-form-select>

                <x-form-select class="form-select-sm mb-3" aria-label=".form-select-sm example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </x-form-select>

                <h3>Multiple</h3>

{{--                 TODO empty name attribute--}}
                <x-form-select class="mb-3" multiple aria-label="multiple select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </x-form-select>

                <h3>Size</h3>

                <x-form-select class="mb-3" size="3" aria-label="size 3 select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </x-form-select>

                <h3>Disabled</h3>

                <x-form-select class="mb-5" aria-label="Disabled select example" disabled>
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </x-form-select>

                <h2 id="form-checks-and-radios">Checks and radios</h2>
                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/checks-radios/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

                <h3>Checks</h3>

{{--                TODO empty name attribute--}}
                <x-form-checkbox value="" label="Default checkbox" id="flexCheckDefault">
                    @slot('help')
                        Just some help text
                    @endslot
                </x-form-checkbox>
                <x-form-checkbox value="" label="Checked checkbox" id="flexCheckChecked" checked/>

                <h3>Indeterminate</h3>

                <p>Skipped can only be done using javascript</p>

                <h3>Disabled</h3>

                <x-form-checkbox value="" id="flexCheckDisabled" disabled label="Disabled checkbox"/>
                <x-form-checkbox value="" id="flexCheckCheckedDisabled" label="Disabled checked checkbox" checked disabled/>

                <h3>Radios</h3>

                <x-form-radio name="flexRadioDefault" id="flexRadioDefault1" label="Default radio">
                    @slot('help')
                        Just some help text
                    @endslot
                </x-form-radio>
                <x-form-radio name="flexRadioDefault" id="flexRadioDefault2" label="Default checked radio" checked/>

                <h3>Disabled</h3>

                <x-form-radio name="flexRadioDisabled" id="flexRadioDisabled" disabled label="Disabled radio"/>
                <x-form-radio name="flexRadioDisabled" id="flexRadioCheckedDisabled" checked disabled label="Disabled checked radio"/>

                <h3>Switches</h3>

                <x-form-checkbox id="flexSwitchCheckDefault1" label="Default switch checkbox input" switch/>
                <x-form-checkbox id="flexSwitchCheckDefault2" label="Checked switch checkbox input" checked switch/>
                <x-form-checkbox id="flexSwitchCheckDefault3" label="Disabled switch checkbox input" disabled switch/>
                <x-form-checkbox id="flexSwitchCheckDefault4" label="Disabled checked switch checkbox input" disabled checked switch/>

                <h3>vertically stacked</h3>

                <p>skipped</p>

                <h3>Inline</h3>

                <div class="mb-3">
                    <x-form-checkbox id="inlineCheckbox1" value="option1" label="1" inline/>
                    <x-form-checkbox id="inlineCheckbox2" value="option1" label="2" inline/>
                    <x-form-checkbox id="inlineCheckbox3" value="option1" label="3 (disabled)" disabled inline/>
                </div>
                <div class="mb-3">
                    <x-form-radio name="inlineRadioOptions" id="inlineRadio1" value="option1" label="1" inline/>
                    <x-form-radio name="inlineRadioOptions" id="inlineRadio2" value="option1" label="2" inline/>
                    <x-form-radio name="inlineRadioOptions" id="inlineRadio3" value="option1" label="3 (disabled)" disabled inline/>
                </div>

                <h3>Without labels</h3>

                <p>Skipped</p>

                <h3>Checkbox toggle buttons</h3>

                <x-form-checkbox id="btn-check" label="Single toggle" toggle class-toggle-button="btn-preview-secondary" class-label="a-class another-class"/>
                <x-form-checkbox id="btn-check-2" label="Checked" toggle checked class-toggle-button="btn-preview-secondary"/>
                <x-form-checkbox id="btn-check-3" label="Disabled" toggle disabled class-toggle-button="btn-preview-secondary"/>

                <h3>Radio toggle buttons</h3>

                <x-form-radio name="options" id="option1" checked label="Checked" toggle class-toggle-button="btn-preview-primary" class-label="a-class another-class"/>
                <x-form-radio name="options" id="option2" label="Radio" toggle class-toggle-button="btn-preview-primary"/>
                <x-form-radio name="options" id="option3" label="Disabled" toggle disabled class-toggle-button="btn-preview-primary"/>
                <x-form-radio name="options" id="option4" label="Radio" toggle class-toggle-button="btn-preview-primary"/>

                <h3>Outlined styles</h3>

                <x-form-checkbox id="btn-check-outlined" label="Single toggle" class-toggle-button="btn-preview-outline-primary" toggle/>
                <x-form-checkbox id="btn-check-2-outlined" checked label="Checked" class-toggle-button="btn-preview-outline-primary" toggle/>
                <x-form-radio name="options-outlined" id="success-outlined" checked label="Checked succes radio" class-toggle-button="btn-preview-outline-secondary" toggle/>
                <x-form-radio  name="options-outlined" id="danger-outlined" label="Danger radio" class-toggle-button="btn-preview-outline-secondary" toggle/>

                <h2 id="form-range">Range</h2>
                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/range/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

                <h3>Standard</h3>
                <x-form-input type="range" class="mb-3" id="customRange1" label="Example range" value="2"/>

                <h3>Disabled</h3>
                <x-form-input type="range" class="mb-3" id="disabledRange" label="Disabled range" value="1" disabled/>

                <h3>Min and max</h3>
                <x-form-input type="range" class="mb-3" min="0" max="5" id="customRange2" label="Example range with min and max" value="2"/>

                <h3>Steps</h3>
                <x-form-input type="range" class="mb-3" min="0" max="5" step="0.5" id="customRange3" label="Example range with min and max and step" value="3"/>

                <h2 id="form-input-group">Input group</h2>
                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/input-group/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

                <h3>Basic example</h3>

                <x-form-input-group class="mb-3">
                    <x-slot:slot1>
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </x-slot:slot1>
                    <x-slot:slot2>
                        <x-form-input type="text" placeholder="Username" aria-label="Username" />
                    </x-slot:slot2>
                </x-form-input-group>

                <div class="input-group mb-3">
                    <x-form-input placeholder="Recipient's username" aria-label="Recipient's username" />
                    <span class="input-group-text" id="basic-addon2">@example.com</span>
                </div>

                <label for="basic-url" class="form-label">Your vanity URL</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                    <x-form-input id="basic-url" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <x-form-input aria-label="Amount (to the nearest dollar)"/>
                    <span class="input-group-text">.00</span>
                </div>

                <div class="input-group mb-3">
                    <x-form-input placeholder="Username" aria-label="Username"/>
                    <span class="input-group-text">@</span>
                    <x-form-input placeholder="Server" aria-label="Server"/>
                </div>

                <div class="input-group">
                    <span class="input-group-text">With textarea</span>
                    <x-form-textarea class="form-control" aria-label="With textarea" name="test">
                        @slot('help')
                            Just some help text
                        @endslot
                    </x-form-textarea>
                </div>

                <h3>Wrapping</h3>

                <x-form-input-group class="flex-nowrap">
                    <x-form-input-group-text id="addon-wrapping">@</x-form-input-group-text>
                    <x-form-input placeholder="Username" aria-label="Username" />
                </x-form-input-group>

                <h3>Sizing</h3>

                <x-form-input-group class="input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
                    <x-form-input aria-label="Sizing example input" />
                </x-form-input-group>

                <x-form-input-group class="mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                    <x-form-input aria-label="Sizing example input" />
                </x-form-input-group>

                <x-form-input-group class="input-group-lg">
                    <span class="input-group-text" id="inputGroup-sizing-lg">Large</span>
                    <x-form-input aria-label="Sizing example input" />
                </x-form-input-group>

                <h3>Checkboxes and radios</h3>
                <x-form-input-group class="mb-3">
                    <x-form-input-group-text class="">
                        <x-form-checkbox class="mt-0" value="" aria-label="Checkbox for following text input"/>
                    </x-form-input-group-text>
                    <x-form-input aria-label="Text input with checkbox"/>
                </x-form-input-group>

                <x-form-input-group class="">
                    <x-form-input-group-text class="input-group-text">
                        <x-form-radio class="mt-0" value="" aria-label="Radio button for following text input"/>
                    </x-form-input-group-text>
                    <x-form-input aria-label="Text input with radio button"/>
                </x-form-input-group>

                <h3>Multiple inputs</h3>
                <x-form-input-group class="input-group">
                    <x-form-input-group-text>Name</x-form-input-group-text>
                    <x-form-input aria-label="First name" placeholder="First name"/>
                    <x-form-input aria-label="Last name" placeholder="Last name"/>
                </x-form-input-group>

                <h3>Multiple addons</h3>

                <x-form-input-group class=" mb-3">
                    <x-form-input-group-text>$</x-form-input-group-text>
                    <x-form-input-group-text>0.00</x-form-input-group-text>
                    <x-form-input aria-label="Dollar amount (with dot and two decimal places)"/>
                </x-form-input-group>

                <x-form-input-group>
                    <x-form-input aria-label="Dollar amount (with dot and two decimal places)"/>
                    <x-form-input-group-text>$</x-form-input-group-text>
                    <x-form-input-group-text>0.00</x-form-input-group-text>
                </x-form-input-group>

                <h3>Button addons</h3>

                <x-form-input-group class="mb-3">
                    <x-form-button class="btn-preview-secondary" id="button-addon1">Button</x-form-button>
                    <x-form-input placeholder="" aria-label="Example text with button addon" />
                </x-form-input-group>

                <x-form-input-group class="mb-3">
                    <x-form-input placeholder="Recipient's username" aria-label="Recipient's username" />
                    <x-form-button class="btn-preview-outline-secondary" id="button-addon2">Button</x-form-button>
                </x-form-input-group>

                <x-form-input-group class="mb-3">
                    <x-form-button class="btn-preview-primary">Button</x-form-button>
                    <x-form-button class="btn-preview-primary">Button</x-form-button>
                    <x-form-input placeholder="" aria-label="Example text with two button addons"/>
                </x-form-input-group>

                <x-form-input-group class="">
                    <x-form-input placeholder="Recipient's username" aria-label="Recipient's username with two button addons"/>
                    <x-form-button>Button</x-form-button>
                    <x-form-button>Button</x-form-button>
                </x-form-input-group>

                <h3>Buttons with dropdowns</h3>
                <x-form-input-group class="mb-3">
                    <x-form-button class="btn-preview-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</x-form-button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                    <x-form-input aria-label="Text input with dropdown button"/>
                </x-form-input-group>

                <x-form-input-group class="mb-3">
                    <x-form-input aria-label="Text input with dropdown button"/>
                    <x-form-button class="btn-preview-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</x-form-button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </x-form-input-group>

                <x-form-input-group class="">
                    <x-form-button class="btn-preview-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</x-form-button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action before</a></li>
                        <li><a class="dropdown-item" href="#">Another action before</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                    <x-form-input aria-label="Text input with 2 dropdown buttons"/>
                    <x-form-button class="btn-preview-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</x-form-button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </x-form-input-group>

                <h3>Segmented buttons</h3>

                <x-form-input-group class="mb-3">
                    <x-form-button class="btn-preview-outline-secondary">Action</x-form-button>
                    <x-form-button class="btn-preview-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </x-form-button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                    <x-form-input aria-label="Text input with segmented dropdown button"/>
                </x-form-input-group>

                <x-form-input-group class="">
                    <x-form-input aria-label="Text input with segmented dropdown button"/>
                    <x-form-button class="btn">Action</x-form-button>
                    <x-form-button class="btn-preview-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </x-form-button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </x-form-input-group>

                <h3>Custom select</h3>

                <x-form-input-group class="mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    <x-form-select id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </x-form-select>
                </x-form-input-group>

                <x-form-input-group class="mb-3">
                    <x-form-select id="inputGroupSelect02">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </x-form-select>
                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                </x-form-input-group>

                <x-form-input-group class="mb-3">
                    <x-form-button class="btn-preview-outline-secondary">Button</x-form-button>
                    <x-form-select id="inputGroupSelect03" aria-label="Example select with button addon">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </x-form-select>
                </x-form-input-group>

                <x-form-input-group class="">
                    <x-form-select id="inputGroupSelect04" aria-label="Example select with button addon">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </x-form-select>
                    <x-form-button class="btn-preview-outline-secondary">Button</x-form-button>
                </x-form-input-group>

                <h3>Custom file input</h3>

                <x-form-input-group class="mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                    <x-form-input type="file" id="inputGroupFile01"/>
                </x-form-input-group>

                <x-form-input-group class="mb-3">
                    <x-form-input type="file" id="inputGroupFile02"/>
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </x-form-input-group>

                <x-form-input-group class="mb-3">
                    <x-form-button class="btn-preview-outline-secondary" id="inputGroupFileAddon03">Button</x-form-button>
                    <x-form-input type="file" id="inputGroupFile03"  aria-label="Upload"/>
                </x-form-input-group>

                <x-form-input-group class="">
                    <x-form-input type="file" id="inputGroupFile04"  aria-label="Upload"/>
                    <x-form-button class="btn-preview-outline-secondary" id="inputGroupFileAddon04">Button</x-form-button>
                </x-form-input-group>

                <h2 id="form-floating-label">Floating labels</h2>
                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/floating-labels/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

                <h3>Example</h3>
                <x-form-input class="mb-3" id="floatingInput" placeholder="name@example.com" floating label="Email address"/>
                <x-form-input id="floatingPassword" placeholder="Password" floating label="Password"/>

                <h3>Value already present</h3>
                <x-form-form class="form-floating">
                    <x-form-input id="floatingInputValue" label="Input with value" placeholder="name@example.com" floating value="test@example.com"/>
                </x-form-form>

                <h3>Form validation styles</h3>
                <x-form-form class="form-floating">
                    <x-form-input class="is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com" label="Invalid input" floating/>
                </x-form-form>

                <h3>Textareas</h3>
                <div class="form-floating">
                    <x-form-textarea placeholder="Leave a comment here" id="floatingTextarea" label="Comments" floating></x-form-textarea>
                </div>

                <h3>Explicit height</h3>
                <div class="form-floating">
                    <x-form-textarea placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" label="Comments" floating></x-form-textarea>
                </div>

                <h3>Selects</h3>
                <div class="form-floating">
                    <x-form-select id="floatingSelect" aria-label="Floating label select example" label="Works with selects" floating>
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </x-form-select>
                </div>

                <h3>Layout</h3>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <x-form-input id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com" floating label="Email address"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <x-form-select id="floatingSelectGrid" aria-label="Floating label select example" floating label="Works with selects">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </x-form-select>
                        </div>
                    </div>
                </div>

                <h2 id="form-layout">Layout</h2>
                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/layout/" target="_blank">bootstrap documentation</a>. Adjusted to use our form-components.</p>

                <h3>Form grid</h3>
                <div class="row mb-3">
                    <div class="col">
                        <x-form-input type="text" placeholder="First name" aria-label="First name"/>
                    </div>
                    <div class="col">
                        <x-form-input type="text" placeholder="Last name" aria-label="Last name"/>
                    </div>
                </div>

                <h3>Gutters</h3>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <x-form-input type="text" placeholder="First name" aria-label="First name"/>
                    </div>
                    <div class="col">
                        <x-form-input type="text" placeholder="Last name" aria-label="Last name"/>
                    </div>
                </div>

                <h3>Complex form</h3>
                <x-form-form class="row g-3 mb-3">
                    <div class="col-md-6">
                        <x-form-input class="mb-5" type="email" label="Email" id="inputEmail4" autocomplete="username"/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input type="password" label="Password" id="inputPassword8" autocomplete="new-password"/>
                    </div>
                    <div class="col-12">
                        <x-form-input type="text" id="inputAddress" label="Address" placeholder="1234 Main St"/>
                    </div>
                    <div class="col-12">
                        <x-form-input type="text" id="inputAddress2" label="Address 2" placeholder="Apartment, studio, or floor"/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input type="text" label="City" id="inputCity"/>
                    </div>
                    <div class="col-md-4">
                        <x-form-select id="inputState" label="State">
                            <option selected>Choose...</option>
                            <option>Kansas</option>
                            <option>Colorado</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-2">
                        <x-form-input type="text" label="Zip" id="inputZip"/>
                    </div>
                    <div class="col-12">
                        <x-form-checkbox  label="Check me out" id="gridCheck"/>
                    </div>
                    <div class="col-12">
                        <x-form-submit class="btn-preview-primary">Sign in</x-form-submit>
                    </div>
                </x-form-form>

                <h3>Horizontal form</h3>

                <x-form-form class="mb-5">
                    <x-form-input type="email" class="mb-3 form-control-sm some-other-class" id="inputEmail1" label="Email test" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" required>
                        @slot('help')
                            horizontal email
                        @endslot
                    </x-form-input>
                    <x-form-input type="password" class="mb-3 form-control-lg" id="inputPassword9" label="Password" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="new-password">
                        @slot('help')
                            horizontal password
                        @endslot
                    </x-form-input>
                    <x-form-input type="range" class="mb-3" id="inputPassword10" label="Range" min="1" step="1" max="10" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="new-password" value="9">
                        @slot('help')
                            horizontal range
                        @endslot
                    </x-form-input>
                    <x-form-textarea class="mb-3 some-other-class" id="textarea-horizontal" label="textarea horizontal" horizontal value="test value using attribute" class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10">
                        @slot('help')
                            horizontal textarea
                        @endslot
                    </x-form-textarea>
                    <x-form-html-editor id="test" class="mb-4 some-other-class" label="HTML editor" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" >
                        hello world!
                    </x-form-html-editor>
                    <x-form-select id="inputState2" label="Select" name="select" class="mb-3 something-else" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10">
                        <option selected>Choose...</option>
                        <option>Kansas</option>
                        <option>Colorado</option>
                        @slot('help')
                            horizontal select
                        @endslot
                    </x-form-select>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <x-form-radio class="mb-5 first-radio-class" name="gridRadios" id="gridRadios1" label="first radio" value="option1" checked/>
                            <x-form-radio name="gridRadios" id="gridRadios2" label="second radio" value="option2" checked/>
                            <x-form-radio name="gridRadios" id="gridRadios3" label="Third disabled option" value="option3" disabled>
                                @slot('help')
                                    radios
                                @endslot
                            </x-form-radio>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <x-form-checkbox id="gridCheck1" class="mb-5 some-checkbox-class" label="Example checkbox">
                                @slot('help')
                                    checkbox
                                @endslot
                            </x-form-checkbox>
                        </div>
                    </div>
                    <div class="row">
                        <x-form-submit class="btn-preview-primary">Sign in</x-form-submit>
                    </div>
                </x-form-form>

                <h3 class="mt-4">Horizontal form label sizing</h3>

                <div class="row mb-3">
                    <x-form-input type="email" class="form-control-sm" id="colFormLabelSm" label="Email" placeholder="col-form-label-sm" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="username"/>
                </div>
                <div class="row mb-3">
                    <x-form-input type="email" id="colFormLabel" label="Email" placeholder="col-form-label" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="username"/>
                </div>
                <div class="row mb-3">
                    <x-form-input type="email" class="form-control-lg" id="colFormLabelLg" label="Email" placeholder="col-form-label-lg" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="username"/>
                </div>

                <h3 class="mb-0">Column sizing</h3>
                <div class="row g-3 mb-3">
                    <div class="col-sm-7">
                        <x-form-input type="text" placeholder="City" aria-label="City"/>
                    </div>
                    <div class="col-sm">
                        <x-form-input type="text" placeholder="State" aria-label="State"/>
                    </div>
                    <div class="col-sm">
                        <x-form-input type="text" placeholder="Zip" aria-label="Zip"/>
                    </div>
                </div>

                <h3>Auto sizing</h3>
                <form class="row gy-2 gx-3 align-items-center mb-3">
                    <div class="col-auto">
                        <x-form-input type="text" id="autoSizingInput" label="Name" placeholder="Jane Doe" class-label="visually-hidden"/>
                    </div>
                    <div class="col-auto">
                        <x-form-input-group>
                            <x-slot name="slot1">
                                <div class="input-group-text">@</div>
                            </x-slot>
                            <x-slot name="slot2">
                                <x-form-input type="text" id="autoSizingInputGroup" label="Username" placeholder="Username" class-label="visually-hidden"/>
                            </x-slot>
                            <x-slot name="slot3">
                                <div class="input-group-text">$</div>
                            </x-slot>
                            <x-slot name="slot4">
                                <div class="input-group-text">#</div>
                            </x-slot>
                            <x-slot name="slot5">
                                <div class="input-group-text">!</div>
                            </x-slot>
                        </x-form-input-group>
                    </div>
                    <div class="col-auto">
                        <x-form-select label="Preferences" id="autoSizingSelect" class-label="visually-hidden">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </x-form-select>
                    </div>
                    <div class="col-auto">
                        <x-form-checkbox label="Remember me" id="autoSizingCheck"/>
                    </div>
                    <div class="col-auto">
                        <x-form-submit class="btn-preview-primary">Submit</x-form-submit>
                    </div>
                </form>

                <h3>Specific column classes</h3>

                <form class="row gx-3 gy-2 align-items-center mb-3">
                    <div class="col-sm-3">
                        <x-form-input type="text" id="specificSizeInputName" label="Name" placeholder="Jane Doe" class-label="visually-hidden"/>
                    </div>
                    <div class="col-sm-3">
                        <x-form-input-group>
                            <x-slot:slot1>
                                <div class="input-group-text">@</div>
                            </x-slot:slot1>
                            <x-slot:slot2>
                                <x-form-input type="text" id="specificSizeInputGroupUsername" label="Username" placeholder="Username" class-label="visually-hidden"/>
                            </x-slot:slot2>
                        </x-form-input-group>
                    </div>
                    <div class="col-sm-3">
                        <x-form-select id="specificSizeSelect" label="Preference" class-label="visually-hidden">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </x-form-select>
                    </div>
                    <div class="col-auto">
                        <x-form-checkbox  label="Remember me" id="autoSizingCheck2"/>
                    </div>
                    <div class="col-auto">
                        <x-form-submit class="btn-preview-primary">Submit</x-form-submit>
                    </div>
                </form>

                <h3>Inline forms</h3>

                <x-form-form action="somewhere" class="row-cols-lg-auto g-3 align-items-center">
                    <div class="col-12 mb-3">
                        <x-form-input-group>
                            <x-slot:slot1>
                                <div class="input-group-text">@</div>
                            </x-slot:slot1>
                            <x-slot:slot2>
                                <x-form-input type="text" id="inlineFormInputGroupUsername" label="Username" placeholder="Username" class-label="visually-hidden"/>
                            </x-slot:slot2>
                        </x-form-input-group>
                    </div>

                    <div class="col-12 mb-3">
                        <x-form-select id="inlineFormSelectPref" label="Preference" class-label="visually-hidden">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </x-form-select>
                    </div>

                    <div class="col-12 mb-3">
                        <x-form-checkbox label="Remember me" id="inlineFormCheck"/>
                    </div>

                    <div class="col-12">
                        <x-form-submit class="btn-preview-primary">Submit</x-form-submit>
                    </div>
                </x-form-form>

                <h2 class="mt-4" id="form-validation">Validation</h2>
                <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/validation/" target="_blank">bootstrap documentation</a>. Adjusted to use our form-components.</p>

                <p>Not all controls support validation styles, see Bootstrap validation. Input, select and checkboxes do. As well as up to 1 form control in an input-group.</p>

                <x-form-form class="row g-3" validation-mode="client-custom">
                    <div class="col-md-4 position-relative">
                        <x-form-input id="validationCustom01" value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Oh no...!"/>
                    </div>
                    <div class="col-md-4">
                        <x-form-input id="validationCustom02" value="Otto" label="Last name" required valid-feedback="Looks good!" invalid-feedback="Oh no...!"/>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <x-form-input-group class="has-validation">
                            <x-form-input-group-text id="inputGroupPrepend">@</x-form-input-group-text>
                            <x-form-input id="validationCustomUsername"  required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
                        </x-form-input-group>
                    </div>
                    <div class="col-md-12">
                        <x-form-textarea id="textarea-horizontal2" label="textarea horizontal" horizontal value="test value using attribute" class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" valid-feedback="Yeah!" invalid-feedback="Nope" required/>
                    </div>
                    <div class="col-md-12">
                        <x-form-input type="range" id="textarea-horizontal3" label="textarea horizontal" horizontal value="5" class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" valid-feedback="Yo Yo!" invalid-feedback="Nah nah" min="0" max="10" step="1"/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input id="validationCustom03" required label="City" valid-feedback="You're set!" invalid-feedback="Please provide a valid city."/>
                    </div>
                    <div class="col-md-3">
                        <x-form-select id="validationCustom04" label="State" required valid-feedback="Way to go!" invalid-feedback="Please select a valid state." placeholder="Choose...">
                            <option>...</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-3">
                        <x-form-input id="validationCustom05" required label="Zip" valid-feedback="All your base are belong to us" invalid-feedback="Please provide a valid zip."/>
                    </div>
                    <div class="col-12">
                        <x-form-checkbox value="" id="invalidCheck" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
                    </div>
                    <div class="col-12">
                        <x-form-radio name="validation-form" value="" id="invalidCheck2" required label="Choose this one..." valid-feedback="You agree" invalid-feedback="You must check one of the buttons"/>
                        <x-form-radio name="validation-form" value="" id="invalidCheck3" required label="...or this one" valid-feedback="You agree" invalid-feedback="You must check one of the buttons"/>
                    </div>
                    <div class="col-12">
                        <x-form-submit class="btn-preview-primary" help-text="Help text using attribute">Submit form</x-form-submit>
                    </div>
                </x-form-form>

                <h3 class="mt-4">Browser defaults</h3>

                <x-form-form class="row g-3" validation-mode="client-default">
                    <div class="col-md-4">
                        <x-form-input id="validationDefault01" value="Mark" required label="First name"/>
                    </div>
                    <div class="col-md-4">
                        <x-form-input id="validationDefault02" value="Otto" required label="Last name"/>
                    </div>
                    <div class="col-md-4">
                        <x-form-label for="validationDefaultUsername" class="form-label">Username</x-form-label>
                        <x-form-input-group>
                            <x-form-input-group-text  id="inputGroupPrepend2">@</x-form-input-group-text>
                            <x-form-input name="test" id="validationDefaultUsername"   required/>
                        </x-form-input-group>
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault03" class="form-label">City</label>
                        <x-form-input id="validationDefault03" required/>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault04" class="form-label">State</label>
                        <x-form-select id="validationDefault04" required placeholder="Choose...">
                            <option>...</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-3">
                        <label for="validationDefault05" class="form-label">Zip</label>
                        <x-form-input id="validationDefault05" required/>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <x-form-checkbox value="" id="invalidCheck4" required label="Agree to terms and conditions"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <x-form-submit class="btn-preview-primary">
                            Submit form
                            @slot('help')
                                help text using slot
                            @endslot
                        </x-form-submit>
                    </div>
                </x-form-form>

                <h3 class="mt-4">Server side</h3>

                <x-form-form class="row g-3" validation-mode="server">
                    <div class="col-md-4">
                        <x-form-input class="is-valid" id="validationServer01" value="Mark" required label="First name"/>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <x-form-input class="is-valid" id="validationServer02" value="Otto" required label="Last name"/>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationServerUsername" class="form-label">Username</label>
                        <x-form-input-group class="has-validation">
                            <x-form-input-group-text id="inputGroupPrepend4">@</x-form-input-group-text>
                            <x-form-input class="is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend4" required/>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </x-form-input-group>
                    </div>
                    <div class="col-md-6">
                        <x-form-input class="is-invalid" id="validationServer03"  required label="City"/>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <x-form-select class="is-invalid" id="validationServer04"  required label="State" placeholder="Choose...">
                            <option>...</option>
                        </x-form-select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <x-form-input class="is-invalid" id="validationServer05"  required label="Zip"/>
                        <div id="validationServer05Feedback" class="invalid-feedback">
                            Please provide a valid zip.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <x-form-checkbox class="is-invalid" value="" id="invalidCheck5"  required label="Agree to terms and conditions"/>
                            <div id="invalidCheck5Feedback" class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <x-form-submit class="btn-preview-primary">Submit form</x-form-submit>
                    </div>
                </x-form-form>

                <h3>Supported elements</h3>

                <x-form-form class="was-validated">
                    <div class="mb-3">
                        <x-form-textarea class="is-invalid" id="validationTextarea" placeholder="Required example textarea" required label="Textarea"></x-form-textarea>
                        <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-form-checkbox id="validationFormCheck1" required label="Check this checkbox out!"/>
                        <div class="invalid-feedback">Example invalid feedback text</div>
                    </div>

                    <div class="mb-3">
                        <x-form-radio id="validationFormCheck2" name="radio-stacked" label="Toggle this radio" required/>
                        <x-form-radio id="validationFormCheck3" name="radio-stacked" label="Or toggle this other radio" required/>
                        <div class="invalid-feedback">More example invalid feedback text</div>
                    </div>

                    <div class="mb-3">
                        <x-form-select required aria-label="select example">
                            <option value="">Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </x-form-select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                    </div>

                    <div class="mb-3">
                        <x-form-input type="file" class="form-control" aria-label="file example" required/>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>

                    <div class="mb-3">
                        <x-form-submit class="btn-preview-primary" disabled>Submit form</x-form-submit>
                    </div>
                </x-form-form>

                <h3>Tooltips</h3>
                <x-form-form class="row g-3 needs-validation" validation-mode="client-custom">
                    <div class="col-md-4 position-relative">
                        <x-form-input id="validationTooltip01" value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Awful!" tooltip-feedback/>
                    </div>
                    <div class="col-md-4 position-relative">
                        <x-form-input id="validationTooltip02" value="Otto" label="Last name" required valid-feedback="All set!" invalid-feedback="Not the way to go" tooltip-feedback/>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltipUsername" class="form-label">Username</label>
                        <x-form-input-group class="has-validation">
                            <x-form-input-group-text id="validationTooltipUsernamePrepend">@</x-form-input-group-text>
                            <x-form-input id="validationTooltipUsername"  required valid-feedback="Wow!" invalid-feedback="Please choose a unique and valid username." tooltip-feedback/>
                        </x-form-input-group>
                    </div>
                    <div class="col-md-6 position-relative">
                        <x-form-input id="validationTooltip03" required valid-feedback="Nice city!" invalid-feedback="Please provide a valid city." tooltip-feedback label="City"/>
                    </div>
                    <div class="col-md-3 position-relative">
                        <x-form-select id="validationTooltip04" required label="State" valid-feedback="Great state!" invalid-feedback="Please select a valid state." tooltip-feedback placeholder="Choose...">
                            <option>...</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-3 position-relative">
                        <x-form-input type="text" class="form-control" id="validationTooltip05" required label="Zip" valid-feedback="Splendid" invalid-feedback="Please provide a valid zip." tooltip-feedback/>
                    </div>
                    <div class="col-12">
                        <x-form-submit class="btn-preview-primary">Submit form</x-form-submit>
                    </div>
                </x-form-form>

                <h3 class="mt-5">Horizontal form validation</h3>
                <x-form-form class="mb-5" validation-mode="client-custom">
                    <x-form-input type="email" class="mb-3" id="inputEmail3" label="Email" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" required invalid-feedback="wrong" help-text="help text using help attribute"/>
                    <x-form-input type="password" class="mb-3" id="inputPassword11" label="Password" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" autocomplete="new-password" required invalid-feedback="try again" help-text="help text using help attribute"/>
                    <x-form-input type="range" class="mb-3" id="inputPassword12" label="Range" min="1" step="1" max="10" value="8" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" invalid-feedback="rejected" help-text="help text using help attribute"/>
                    <x-form-textarea class="mb-5" id="textarea-horizontal4" label="textarea horizontal" horizontal value="test value using attribute" class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" required invalid-feedback="invalid" help-text="help text using help attribute"/>
                    <x-form-select id="inputState3" label="State" class="mb-5" horizontal class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" invalid-feedback="wrong choice" required help-text="help text using help attribute" placeholder="Choose...">
                        <option>Iowa</option>
                        <option>Kansas</option>
                        <option>Colorado</option>
                    </x-form-select>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                            <x-form-radio name="gridRadios" id="gridRadios4" label="first radio" value="option1" required/>
                            <x-form-radio name="gridRadios" id="gridRadios5" label="second radio" value="option2" required/>
                            <x-form-radio name="gridRadios" id="gridRadios6" label="Third radio" value="option3" required invalid-feedback="You must select one of these 3 radio boxes" help-text="help text using help attribute"/>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <x-form-checkbox id="gridCheck2" label="Example checkbox" required invalid-feedback="Must be checked" help-text="help text using help attribute"/>
                        </div>
                    </div>
                    <div class="row">
                        <x-form-submit class="btn-preview-primary">Sign in</x-form-submit>
                    </div>
                </x-form-form>

                <h2 class="mt-4" id="form-custom-tests">Custom tests</h2>
                <p>Custom tests not based on Bootstrap documentation</p>

                <h3 >Setting validation-mode to "client-default" and "client-custom" attribute on form component with custom validation</h3>

                <x-form-form class="row g-3" validation-mode="client-custom">
                    <div class="col-md-4 position-relative">
                        <x-form-input id="validationCustom06" value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Oh no...!"/>
                    </div>
                    <div class="col-md-4">
                        <x-form-input id="validationCustom07" value="Otto" label="Last name" required valid-feedback="Looks good!" invalid-feedback="Oh no...!"/>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername2" class="form-label">Username</label>
                        <x-form-input-group class="has-validation">
                            <x-form-input-group-text id="inputGroupPrepend5">@</x-form-input-group-text>
                            <x-form-input id="validationCustomUsername2"  required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
                        </x-form-input-group>
                    </div>
                    <div class="col-md-12">
                        <x-form-textarea id="textarea-horizontal5" label="textarea horizontal" horizontal value="test value using attribute" class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" valid-feedback="Yeah!" invalid-feedback="Nope" required/>
                    </div>
                    <div class="col-md-12">
                        <x-form-input type="range" id="textarea-horizontal6" label="textarea horizontal" horizontal value="5" class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" valid-feedback="Yo Yo!" invalid-feedback="Nah nah" min="0" max="10" step="1" value="7"/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input id="validationCustom08" required label="City" valid-feedback="You're set!" invalid-feedback="Please provide a valid city."/>
                    </div>
                    <div class="col-md-3">
                        <x-form-select id="validationCustom09" label="State" required valid-feedback="Way to go!" invalid-feedback="Please select a valid state." placeholder="Choose...">
                            <option>...</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-3">
                        <x-form-input id="validationCustom10" required label="Zip" valid-feedback="All your base are belong to us" invalid-feedback="Please provide a valid zip."/>
                    </div>
                    <div class="col-12">
                        <x-form-checkbox value="" id="invalidCheck6" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
                    </div>
                    <div class="col-12">
                        <x-form-radio name="validation-form" value="" id="invalidCheck7" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
                        <x-form-radio name="validation-form" value="" id="invalidCheck8" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
                    </div>
                    <div class="col-12">
                        <x-form-submit class="btn-preview-primary">Submit form</x-form-submit>
                    </div>
                </x-form-form>

                <h3 class="mt-4" id="form-client-default-validation">Setting validation-mode="default"" attribute on form component with custom validation</h3>

                <x-form-form class="row g-3" validation-mode="client-default">
                    <div class="col-md-4 position-relative">
                        <x-form-input id="validationCustom11" value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Oh no...!"/>
                    </div>
                    <div class="col-md-4">
                        <x-form-input id="validationCustom12" value="Otto" label="Last name" required valid-feedback="Looks good!" invalid-feedback="Oh no...!"/>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername3" class="form-label">Username</label>
                        <x-form-input-group class="has-validation">
                            <x-form-input-group-text id="inputGroupPrepend6">@</x-form-input-group-text>
                            <x-form-input id="validationCustomUsername3"  required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
                        </x-form-input-group>
                    </div>
                    <div class="col-md-12">
                        <x-form-textarea id="textarea-horizontal7" label="textarea horizontal" horizontal value="test value using attribute" class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" valid-feedback="Yeah!" invalid-feedback="Nope" required/>
                    </div>
                    <div class="col-md-12">
                        <x-form-input type="range" id="textarea-horizontal8" label="textarea horizontal" horizontal value="5" class-horizontal-cols-label="col-2" class-horizontal-cols-control="col-10" valid-feedback="Yo Yo!" invalid-feedback="Nah nah" min="0" max="10" step="1"/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input id="validationCustom13" required label="City" valid-feedback="You're set!" invalid-feedback="Please provide a valid city."/>
                    </div>
                    <div class="col-md-3">
                        <x-form-select id="validationCustom14" label="State" required valid-feedback="Way to go!" invalid-feedback="Please select a valid state." placeholder="Choose...">
                            <option>...</option>
                        </x-form-select>
                    </div>
                    <div class="col-md-3">
                        <x-form-input id="validationCustom15" required label="Zip" valid-feedback="All your base are belong to us" invalid-feedback="Please provide a valid zip."/>
                    </div>
                    <div class="col-12">
                        <x-form-checkbox value="" id="invalidCheck9" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
                    </div>
                    <div class="col-12">
                        <x-form-radio name="validation-form" value="" id="invalidCheck10" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
                        <x-form-radio name="validation-form" value="" id="invalidCheck11" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
                    </div>
                    <div class="col-12">
                        <x-form-submit class="btn-preview-primary">Submit form</x-form-submit>
                    </div>
                </x-form-form>

                <h3 class="mt-4">HTML editor (tinyMCE)</h3>
                <x-form-html-editor id="test-2">
                    hello world!
                </x-form-html-editor>

                <h3 class="mt-4">All form-input types</h3>
                <x-form-form id="form-all-input-types">
                    <x-form-input class="mb-3 d-block" name="button-1" type="button" label="Button" value="Button"/>
                    <x-form-input class="mb-3" name="checkbox-1" type="checkbox" label="Checkbox"/>
                    <x-form-input class="mb-3" name="color-1" type="color" label="Color"/>
                    <x-form-input class="mb-3" name="date-1" type="date" label="Date"/>
                    <x-form-input class="mb-3" name="datetime-local-1" type="datetime-local" label="Datetime local"/>
                    <x-form-input class="mb-3" name="email-1" type="email" label="Email" autocomplete="username"/>
                    <x-form-input class="mb-3" name="file-1" type="file" label="File"/>
                    <div class="mb-3">
                        <span>Hidden</span>
                        <x-form-input class="mb-3" name="hidden-1" type="hidden" label="Hidden"/>
                    </div>
                    <x-form-input class="mb-3" name="month-1" type="month" label="Month"/>
                    <x-form-input class="mb-3 w-auto d-block" name="image-1" type="image" label="Image" src="{{ package_asset('button-image.png') }}" height="40" alt="image button"/>
                    <x-form-input class="mb-3" name="number-1" type="number" label="Number"/>
                    <x-form-input class="mb-3" name="password-1" type="password" label="Password" autocomplete="current-password"/>
                    <x-form-input class="mb-3" name="radio-1" type="radio" label="Radio"/>
                    <x-form-input class="mb-3" name="range-1" type="range" label="Range" value="2"/>
                    <x-form-input class="mb-3 d-block" name="reset-1" type="reset" label="Reset" value="Reset"/>
                    <x-form-input class="mb-3" name="search-1" type="search" label="Search"/>
                    <x-form-input class="mb-3 d-block" name="submit-1" type="submit" label="Submit" value="Submit"/>
                    <x-form-input class="mb-3" name="tel-1" type="tel" label="Tel" autocomplete="tel"/>
                    <x-form-input class="mb-3" name="text-1" type="text" label="Text"/>
                    <x-form-input class="mb-3" name="time-1" type="time" label="Time"/>
                    <x-form-input class="mb-3" name="url-1" type="url" label="Url"/>
                    <x-form-input class="mb-3" name="week-1" type="week" label="Week"/>
                    <x-form-submit>
                        Submit button using x-form-submit component
                    </x-form-submit>
                    <x-form-button>
                       Just a button
                    </x-form-button>
                </x-form-form>

                <h3 class="mt-4">All controls with hidden attribute, shouldn't be visible and not have labels, help text or errors rendered</h3>
                <x-form-form id="form-controls-hidden">
                    <x-form-input class="mb-3 d-block" name="button-2" type="button" label="Button" value="Button" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="checkbox-2" type="checkbox" label="Checkbox" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3" name="color-2" type="color" label="Color" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="date-2" type="date" label="Date" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3" name="datetime-local-2" type="datetime-local" label="Datetime local" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="email-2" type="email" label="Email" autocomplete="username" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3" name="file-2" type="file" label="File" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="hidden-2" type="hidden" label="Hidden">
                        {{-- no need for hidden attribute --}}
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3" name="month-2" type="month" label="Month" hidden help-text="test"/>
                    <x-form-input class="mb-3 w-auto" name="image-2" type="image" label="Image" src="{{ package_asset('button-image.png') }}" height="40" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3" name="number-2" type="number" label="Number" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="password-2" type="password" label="Password" autocomplete="current-password" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3" name="radio-2" type="radio" label="Radio" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="range-2" type="range" label="Range" hidden value="5">
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3 d-block" name="reset-2" type="reset" label="Reset" value="Reset" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="search-2" type="search" label="Search" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3 d-block" name="submit-2" type="submit" label="Submit" value="Submit" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="tel-2" type="tel" label="Tel" autocomplete="tel" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3" name="text-2" type="text" label="Text" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="time-2" type="time" label="Time" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-input class="mb-3" name="url-2" type="url" label="Url" hidden help-text="test"/>
                    <x-form-input class="mb-3" name="week-2" type="week" label="Week" hidden>
                        @slot('help')
                            help text
                        @endslot
                    </x-form-input>
                    <x-form-submit hidden help-text="test">
                        Submit button using x-form-submit component
                    </x-form-submit>
                    <x-form-button hidden>
                        Just a button
                        @slot('help')
                            help text
                        @endslot
                    </x-form-button>
                    <x-form-select hidden label="hidden select" help-text="test">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </x-form-select>
                    <x-form-checkbox hidden label="hidden checkbox">
                        @slot('help')
                            help text
                        @endslot
                    </x-form-checkbox>
                    <x-form-radio hidden label="hidden radio" help-text="test"></x-form-radio>
                    <x-form-textarea hidden label="hidden textarea">
                        @slot('help')
                            help text
                        @endslot
                    </x-form-textarea>
                    <x-form-html-editor hidden label="hidden html-editor" help-text="test"></x-form-html-editor>
                    <x-form-input-group hidden>
                        <x-form-input name="something" label="Something"></x-form-input>
                        <x-form-input name="something-else" label="Something else"></x-form-input>
                    </x-form-input-group>
                </x-form-form>

                <h3 class="mt-4">Input group with more than one control</h3>
                <x-form-form validation-mode="custom">
                    <x-form-input-group class="mb-5">
                        <x-form-input-group-text>First and last name</x-form-input-group-text>
                        <x-form-input aria-label="First name" required />
                        <x-form-input aria-label="Last name" required invalid-feedback="No way"/>
                    </x-form-input-group>
                    <x-form-input-group class="mb-5">
                        <x-form-input-group-text>First name</x-form-input-group-text>
                        <x-form-input aria-label="First name" required invalid-feedback="Nope"/>
                    </x-form-input-group>
                    <x-form-submit class="btn-preview-primary mt-3">Submit form</x-form-submit>

                </x-form-form>

                <h3>Input group labels</h3>

                <x-form-form>
                    <x-form-input-group id="input-group-1" class="mt-5 something-else" for="input-group-1-input" label="Label outside of input-group, by using label, for and required attributes" required help-text="help text for input group">
                        <x-form-input id="input-group-1-input" name="text" type="text" />
                        <x-form-input-group-text>
                            input group text
                        </x-form-input-group-text>
                    </x-form-input-group>
                </x-form-form>

                <h3>label at start of controls (default behaviour)</h3>

                <p>Only applicable to inputs, textarea, select. Html-editor buggy support.</p>

                <x-form-form>
                    <x-form-input-group id="input-group-2" class="mt-5 something-else" required help-text="help text for input group">
                        <x-form-input id="input-group-2-control" name="text" type="text" label="Label for input"/>
                        <x-form-input-group-text class="text-primary">
                            label should appear before preceding input
                        </x-form-input-group-text>
                    </x-form-input-group>
                    <x-form-input-group id="input-group-3" class="mt-5 something-else" required help-text="help text for input group">
                        <x-form-textarea id="input-group-3-control" name="text" type="text" label="Label for textarea"/>
                        <x-form-input-group-text class="text-primary">
                            label should appear before preceding textarea
                        </x-form-input-group-text>
                    </x-form-input-group>
                    <x-form-input-group id="input-group-4" class="mt-5 something-else" required help-text="help text for input group">
                        <x-form-select id="input-group-4-control" name="text" label="Label for select"/>
                        <x-form-input-group-text class="text-primary">
                            label should appear before preceding select
                        </x-form-input-group-text>
                    </x-form-input-group>
                    <x-form-input-group id="input-group-5" class="mt-5 something-else" required help-text="help text for input group">
                        <x-form-html-editor id="input-group-5-control" name="text" type="text" label="Label for html-editor"/>
                        <x-form-input-group-text class="text-primary">
                            label should appear before preceding html-editor
                        </x-form-input-group-text>
                    </x-form-input-group>
                </x-form-form>


                <h3>label at end of controls (using attribute "label-end")</h3>

                <p>Only applicable to inputs, textarea, select. Html-editor buggy support.</p>

                <x-form-form>
                    <x-form-input-group id="input-group-6" class="mt-5 something-else" required help-text="help text for input group">
                        <x-form-input-group-text class="text-primary">
                            label should appear after following input
                        </x-form-input-group-text>
                        <x-form-input id="input-group-6-control" name="text" type="text" label="Label for input" label-end/>
                    </x-form-input-group>
                    <x-form-input-group id="input-group-7" class="mt-5 something-else" required help-text="help text for input group">
                        <x-form-input-group-text class="text-primary">
                            label should appear after following textarea
                        </x-form-input-group-text>
                        <x-form-textarea id="input-group-7-control" name="text" type="text" label="Label for textarea" label-end/>
                    </x-form-input-group>
                    <x-form-input-group id="input-group-8" class="mt-5 something-else" required help-text="help text for input group">
                        <x-form-input-group-text class="text-primary">
                            label should appear after following select
                        </x-form-input-group-text>
                        <x-form-select id="input-group-8-control" name="text" label="Label for select" label-end/>
                    </x-form-input-group>
                    <x-form-input-group id="input-group-9" class="mt-5 something-else flex-nowrap" required help-text="help text for input group">
                        <x-form-input-group-text class="text-primary">
                            label should appear after following html-editor
                        </x-form-input-group-text>
                        @php
                            $htmlEditorBind = ['html-editor' => 'HTML editor preview content (added "flex-nowrap" class to prevent label from wrapping to new line and clicking label does not focus TinyMCE editor content)'];
                        @endphp
                        <x-form-html-editor id="input-group-9-control" name="html-editor" label="Label for html-editor" :bind="$htmlEditorBind" label-end>
                            test content
                        </x-form-html-editor>
                    </x-form-input-group>
                </x-form-form>

                <h3>HTML editor value using slot (and not-supported floating label)</h3>
                <x-form-form>
                    <x-form-html-editor id="input-group-10-control" name="html-editor" label="Label for html-editor" floating>
                        test content
                    </x-form-html-editor>
                </x-form-form>

                <h3>Form Group</h3>

                <x-form-form validation-mode="client-custom">
                    <x-form-group name="radio-inline-1" class="mb-3 p-3" label="Receive newsletters?" required invalid-feedback="Select one of the two buttons" valid-feedback="That's clear!" help-text="test help text" class-help-text="text-primary">
                        <x-form-radio name="radio-inline-1" class="me-3" value="1" label="Yes" invalid-feedback="nope" valid-feedback="yeah" required :show-errors="false" />
                        <x-form-radio name="radio-inline-1" value="2" label="No" />
                    </x-form-group>
                    <x-form-group name="checkbox-inline-1" class="mb-3 p-3" label="Want more updates?" required invalid-feedback="You must check both checkboxes" valid-feedback="All right!" help-text="test help text">
                        <x-form-checkbox name="checkbox-inline-1" class="me-3" value="1" label="Yes" invalid-feedback="nope" valid-feedback="yeah" required :show-errors="false"/>
                        <x-form-checkbox name="checkbox-inline-1" value="2" label="Yes, please!" required />
                    </x-form-group>
                    <x-form-group class="mb-3 p-3" label="Explain why you made this choice" required invalid-feedback="Put some text in both textareas" valid-feedback="You are a hero, says textarea group!" class-inline-wrapper="gap-3" help-text="test help text">
                        <x-form-textarea label="In this textarea" class="mb-3" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-textarea>
                        <x-form-textarea label="And in this one" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-textarea>
                    </x-form-group>
                    <x-form-group class="mb-3 p-3" label="Explain some more" required invalid-feedback="Put some text in both text fields" valid-feedback="Way to go!" help-text="test help text">
                        <x-form-input label="In this text field" class="mb-3" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-input>
                        <x-form-input label="And in this one too" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-input>
                    </x-form-group>
                    <x-form-group class="mb-3 p-3" label="Where did you hear of us?" required invalid-feedback="Select a value" valid-feedback="Way to go!" help-text="test help text">
                        <x-form-select label="Select one" class="mb-3" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false" placeholder="Make a selection">
                            <option value="Newspaper">Newspaper</option>
                            <option value="TV">Tv</option>
                            <option value="Radio">Radio</option>
                            <option value="Google">Google</option>
                            <option value="Other">Other</option>
                        </x-form-select>
                        <x-form-select label="Select two" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false" placeholder="Make a selection">
                            <option value="Newspaper">Newspaper</option>
                            <option value="TV">Tv</option>
                            <option value="Radio">Radio</option>
                            <option value="Google">Google</option>
                            <option value="Other">Other</option>
                        </x-form-select>
                    </x-form-group>
                    <x-form-submit></x-form-submit>
                </x-form-form>

                <h3>Form Group inline (with client side validation on group)</h3>
                <x-form-form validation-mode="client-custom">
                    <x-form-group name="radio-inline-1" class="mb-3 p-3" label="Receive newsletters?" inline required invalid-feedback="Select one of the two buttons" valid-feedback="That's clear!">
                        <x-form-radio name="radio-inline-1" class="me-3" value="1" label="Yes" invalid-feedback="nope" valid-feedback="yeah" required :show-errors="false" />
                        <x-form-radio name="radio-inline-1" value="2" label="No" />
                    </x-form-group>
                    <x-form-group name="checkbox-inline-1" class="mb-3 p-3" label="Want more updates?" inline required invalid-feedback="You must check both checkboxes" valid-feedback="All right!">
                        <x-form-checkbox name="checkbox-inline-1" class="me-3" value="1" label="Yes" invalid-feedback="nope" valid-feedback="yeah" required :show-errors="false"/>
                        <x-form-checkbox name="checkbox-inline-1" value="2" label="Yes, please!" required />
                    </x-form-group>
                    <x-form-group class="mb-3 p-3" label="Explain why you made this choice" inline required invalid-feedback="Put some text in both textareas" valid-feedback="You are a hero, says textarea group!" class-inline-wrapper="gap-3">
                        <x-form-textarea label="In this textarea" class="mb-3" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-textarea>
                        <x-form-textarea label="And in this one" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-textarea>
                    </x-form-group>
                    <x-form-group class="mb-3 p-3" label="Explain some more" inline required invalid-feedback="Put some text in both text fields" valid-feedback="Way to go!">
                        <x-form-input label="In this text field" class="mb-3" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-input>
                        <x-form-input label="And in this one too" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false"></x-form-input>
                    </x-form-group>
                    <x-form-group class="mb-3 p-3" label="Where did you hear of us?" inline required invalid-feedback="Select a value" valid-feedback="Way to go!">
                        <x-form-select label="Select one" class="mb-3" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false" placeholder="Make a selection">
                            <option value="Newspaper">Newspaper</option>
                            <option value="TV">Tv</option>
                            <option value="Radio">Radio</option>
                            <option value="Google">Google</option>
                            <option value="Other">Other</option>
                        </x-form-select>
                        <x-form-select label="Select two" required invalid-feedback="nope" valid-feedback="yeah" :show-errors="false" placeholder="Make a selection">
                            <option value="Newspaper">Newspaper</option>
                            <option value="TV">Tv</option>
                            <option value="Radio">Radio</option>
                            <option value="Google">Google</option>
                            <option value="Other">Other</option>
                        </x-form-select>
                    </x-form-group>
                    <x-form-submit></x-form-submit>
                </x-form-form>

                <h3>Form Group inline 2 (with client side validation on inputs)</h3>
                <x-form-form validation-mode="client-custom">
                    <x-form-group name="radio-inline-2" class="mb-3 p-3" label="Receive newsletters?" :show-errors="false" inline>
                        <x-form-radio name="radio-inline-2" class="me-3" value="1" label="Yes" invalid-feedback="nope" valid-feedback="yeah" />
                        <x-form-radio name="radio-inline-2" value="2" label="No" required />
                    </x-form-group>
                    <x-form-group name="checkbox-inline-2" class="mb-3 p-3" label="Want more updates?" :show-errors="false" inline>
                        <x-form-checkbox name="checkbox-inline-2" class="me-3" value="1" label="Yes" required invalid-feedback="nope" valid-feedback="yeah" />
                        <x-form-checkbox name="checkbox-inline-2" value="2" label="Yes, please!" required invalid-feedback="nope" valid-feedback="yeah"/>
                    </x-form-group>
                    <x-form-group class="mb-5 p-3" label="Explain why you made this choice" :show-errors="false" inline>
                        <x-form-textarea label="In this textarea" required invalid-feedback="textarea invalid" valid-feedback="textarea 1 valid"></x-form-textarea>
                        <x-form-textarea label="And in this one" required invalid-feedback="textarea invalid" valid-feedback="textarea 2 valid" ></x-form-textarea>
                    </x-form-group>
                    <x-form-group class="mb-5 p-3" label="Explain some more" inline :show-errors="false" >
                        <x-form-input label="In this text field" required invalid-feedback="nope" valid-feedback="yeah" ></x-form-input>
                        <x-form-input label="And in this one too" required invalid-feedback="nope" valid-feedback="yeah" ></x-form-input>
                    </x-form-group>
                    <x-form-group class="mb-3 p-3" label="Where did you hear of us?" inline :show-errors="false" >
                        <x-form-select label="Select one" class="mb-3" required placeholder="Make a selection" valid-feedback="yeah" placeholder="Make a selection">
                            <option value="Newspaper">Newspaper</option>
                            <option value="TV">Tv</option>
                            <option value="Radio">Radio</option>
                            <option value="Google">Google</option>
                            <option value="Other">Other</option>
                        </x-form-select>
                        <x-form-select label="Select two" required invalid-feedback="nope" valid-feedback="yeah" placeholder="Make a selection">
                            <option value="Newspaper">Newspaper</option>
                            <option value="TV">Tv</option>
                            <option value="Radio">Radio</option>
                            <option value="Google">Google</option>
                            <option value="Other">Other</option>
                        </x-form-select>
                    </x-form-group>
                    <x-form-submit></x-form-submit>
                </x-form-form>

                <h3>Input group size</h3>
                <x-form-form>
                    <x-form-input-group class="mb-3 input-group-sm">
                        <x-slot:slot1>
                            <span class="input-group-text" id="basic-addon4">@</span>
                        </x-slot:slot1>
                        <x-slot:slot2>
                            <x-form-input type="text" placeholder="Username" aria-label="Username"/>
                        </x-slot:slot2>
                        <x-slot:slot3>
                            <x-form-input type="text" placeholder="Nickname" aria-label="Nickname" />
                        </x-slot:slot3>
                    </x-form-input-group>
                </x-form-form>

                @php
                    $bind1 = [
                       'input-3' => 'value 3 by bind directive',
                       'input-4' => 'value 4 by bind directive',
                       'input-5' => 'value 5 by bind directive',
                       'textarea-3' => 'value 3 by bind directive',
                       'textarea-4' => 'value 4 by bind directive',
                       'textarea-5' => 'value 5 by bind directive',
                       'html-editor-3' => 'value 3 by bind directive',
                       'html-editor-4' => 'value 4 by bind directive',
                       'html-editor-5' => 'value 5 by bind directive',
                       ];

                     $bind2 = [
                       'input-3' => 'value 3 by bind attribute',
                       'input-4' => 'value 4 by bind attribute',
                       'input-5' => 'value 5 by bind attribute',
                       'textarea-3' => 'value 3 by bind attribute',
                       'textarea-4' => 'value 4 by bind attribute',
                       'textarea-5' => 'value 5 by bind attribute',
                       'html-editor-3' => 'value 3 by bind attribute',
                       'html-editor-4' => 'value 4 by bind attribute',
                       'html-editor-5' => 'value 5 by bind attribute',
                      ];

                    session()->flash('_old_input', [
                      'input-5' => 'value 5 by old value',
                      'textarea-5' => 'value 5 by old value',
                      'html-editor-5' => 'value 5 by old value',
                    ]);
                @endphp

                <h3>Value precedence</h3>
                <x-form-form>
                    @bind($bind1)
                        <h4>Input 1 - only default</h4>
                        <x-form-input name="input-1" default="value 1 by default"></x-form-input>

                        <h4>Input 2 - value attribute and default</h4>
                        <x-form-input name="input-2" default="value 2 by default" value="value 2 by value attribute"></x-form-input>

                        <h4>Input 3 - Bound directive, value attribute and default</h4>
                        <x-form-input name="input-3" default="value 3 by default" value="value 3 by value attribute"></x-form-input>

                        <h4>Input 4 - Bound attribute, bound directive, value attribute and default</h4>
                        <x-form-input name="input-4" default="value 4 by default" :bind="$bind2" value="value 4 by value attribute"></x-form-input>

                        <h4>Input 5 - old, bound, value attribute and default</h4>
                        <x-form-input name="input-5" default="value 5 by default" value="value 5 by value attribute"></x-form-input>

                    <x-form-textarea name="textarea-1" default="value 1 by default"></x-form-textarea>
                    <x-form-textarea name="textarea-2" default="value 2 by default" value="value 2 by value attribute"></x-form-textarea>
                    <x-form-textarea name="textarea-3" default="value 3 by default" value="value 3 by value attribute"></x-form-textarea>
                    <x-form-textarea name="textarea-4" default="value 4 by default" :bind="$bind2" value="value 4 by value attribute"></x-form-textarea>
                    <x-form-textarea name="textarea-5" default="value 5 by default" value="value 5 by value attribute"></x-form-textarea>

                    <x-form-html-editor name="html-editor-1" default="value 1 by default"></x-form-html-editor>
                    <x-form-html-editor name="html-editor-2" default="value 2 by default" value="value 2 by value attribute"></x-form-html-editor>
                    <x-form-html-editor name="html-editor-3" default="value 3 by default" value="value 3 by value attribute"></x-form-html-editor>
                    <x-form-html-editor name="html-editor-4" default="value 4 by default" :bind="$bind2" value="value 4 by value attribute"></x-form-html-editor>
                    <x-form-html-editor name="html-editor-5" default="value 5 by default" value="value 5 by value attribute"></x-form-html-editor>
                    @endbind
                </x-form-form>

                <h3>Input group icons</h3>
                <x-form-form>
                    <h4>Font icons</h4>
                    <x-form-input-group-icon class="mb-3" class-font-icon="bi-alarm" icon-position="start" for="font-icon-1">
                        <x-form-input id="font-icon-1" name="input-1" value="test value"></x-form-input>
                    </x-form-input-group-icon>
                    <x-form-input-group-icon class-font-icon="bi-alarm" icon-position="end" for="font-icon-2">
                        <x-form-input id="font-icon-2" name="input-1" value="test value"></x-form-input>
                    </x-form-input-group-icon>

                    <h4>Image icons</h4>

                    <x-form-input-group-icon class="mb-3" icon-position="start" for="image-icon-1">
                        <x-form-input id="image-icon-1" name="input-1" value="test value"></x-form-input>
                        @slot('iconImg')
                            <img src="{{ package_asset('icon-envelope.png') }}" alt="">
                        @endslot
                    </x-form-input-group-icon>
                    <x-form-input-group-icon icon-position="end" for="image-icon-2">
                        <x-form-input id="image-icon-2" name="input-1" value="test value"></x-form-input>
                        @slot('iconImg')
                            <img src="{{ package_asset('icon-envelope.png') }}" alt="">
                        @endslot
                    </x-form-input-group-icon>

                    <h4>Svg icons</h4>

                    <x-form-input-group-icon class="mb-3" icon-position="start" for="svg-1">
                        <x-form-input id="svg-1" name="input-1" value="test value"></x-form-input>
                        @slot('iconSvg')
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
                            </svg>
                        @endslot
                    </x-form-input-group-icon>
                    <x-form-input-group-icon icon-position="end" for="svg-2">
                        <x-form-input id="svg-2" name="input-1" value="test value"></x-form-input>
                        @slot('iconSvg')
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5"/>
                            </svg>
                        @endslot
                    </x-form-input-group-icon>

                    <h4>SVG sprite icons</h4>
                    <x-form-input-group-icon class="mb-3" svg-sprite-href="{{ package_asset('sprite.svg') }}#right" icon-position="start" for="sprite-1">
                        <x-form-input id="sprite-1" name="input-1" value="test value"></x-form-input>
                    </x-form-input-group-icon>
                    <x-form-input-group-icon svg-sprite-href="{{ package_asset('sprite.svg') }}#left" icon-position="end" for="sprite-2">
                        <x-form-input id="sprite-2" name="input-1" value="test value"></x-form-input>
                    </x-form-input-group-icon>
                </x-form-form>
            </div>
        </div>
    </body>
</html>
