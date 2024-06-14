<x-layout>

    <h1>Mlbrgn form components test page</h1>

    <h2 style="color:green !important">Section links:</h2>
    <ul>
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

    <h2 id="form-overview" class="mt-5" style="color:green !important">Overview</h2>

    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.0/forms/overview/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

    <x-form-form>
        <div class="mb-3">
            <x-form-input id="exampleInputEmail1" aria-describedby="emailHelp" label="Email address"/>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <x-form-input type="password" id="exampleInputPassword1" label="Password"/>
        </div>
        <x-form-checkbox class="mb-3" id="exampleCheck1" label="Check me out"/>
        <button type="submit" class="btn btn-primary">Submit</button>
    </x-form-form>

    <h3 class="mt-3">Form text</h3>
    <x-form-input type="password" id="inputPassword5" aria-describedby="passwordHelpBlock" label="Password"/>
    <div id="passwordHelpBlock" class="form-text">
        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
    </div>

    <h3 class="mt-3">Inline text</h3>
    <p><span class="text-danger">TODO: </span>Labels in other col and form text too</p>
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
            <x-form-input type="password" id="inputPassword6" aria-describedby="passwordHelpInline"/>
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
              Must be 8-20 characters long.
            </span>
        </div>
    </div>

    <h3 class="mt-3">Disabled forms</h3>
    <x-form-form>
        <fieldset disabled>
            <legend>Disabled fieldset example</legend>
            <div class="mb-3">
                <x-form-input id="disabledTextInput"  placeholder="Disabled input" label="Disabled input"/>
            </div>
            <div class="mb-3">
                <x-form-select id="disabledSelect" label="Disabled select menu">
                    <option>Disabled select</option>
                </x-form-select>
            </div>
            <div class="mb-3">
                <x-form-checkbox id="disabledFieldsetCheck" disabled label="Can't check this"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </x-form-form>


    <h2 id="form-controls" class="mt-5" style="color:green !important">Form controls</h2>

    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/form-control/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

    <h3 class="mt-3">Example</h3>

    <div class="mb-3">
        <x-form-input type="email" id="exampleFormControlInput1" label="Email address" placeholder="name@example.com" required/>
    </div>
    <div class="mb-3">
        <x-form-textarea id="exampleFormControlTextarea1" label="Example textarea" rows="3"></x-form-textarea>
    </div>

    <h3 class="mt-3">Sizing</h3>

    <x-form-input class="form-control-lg mb-3" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example"/>
    <x-form-input class="mb-3" type="text" placeholder="Default input" aria-label="default input example"/>
    <x-form-input class="form-control-sm mb-3" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example"/>

    <h3 class="mt-3">Form text</h3>

    <x-form-input type="password" id="inputPassword5" label="password" aria-describedby="passwordHelpBlock"/>
    <div id="passwordHelpBlock" class="form-text mb-3">
        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
    </div>

    <h3 class="mt-3">Disabled</h3>

    <x-form-input class="mb-3" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled/>
    <x-form-input class="mb-3" type="text" value="Disabled readonly input" aria-label="Disabled input example" disabled readonly/>

    <h3 class="mt-3">Readonly</h3>

    <x-form-input type="text" value="Readonly input here..." aria-label="readonly input example" readonly/>

    <h3 class="mt-3">Readonly plain text </h3>

    <x-form-input readonly class="form-control-plaintext mb-3" id="staticEmail" label="Email" value="email@example.com" horizontal class-label="col-2" class-control="col-10"/>

    <x-form-input type="password" class="mb-3" label="Password" id="inputPassword" horizontal class-label="col-2" class-control="col-10"/>

    <x-form-form class="row g-3">
        <div class="col-auto">
            <x-form-input readonly class="form-control-plaintext" label="Email" id="staticEmail2" value="email@example.com" class-label="visually-hidden"/>
        </div>
        <div class="col-auto">
            <x-form-input type="password" id="inputPassword2" label="Password" placeholder="Password" class-label="visually-hidden"/>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
        </div>
    </x-form-form>

    <h3 class="mt-3">File inputs</h3>

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

    <h3 class="mt-3">Colors</h3>

    <x-form-input type="color" class="form-control-color mb-3" id="exampleColorInput" value="#563d7c" label="Color picker" title="Choose your color"/>

    <h3 class="mt-3">Datalist</h3>

    <x-form-input list="datalistOptions" id="exampleDataList" label="Datalist example" placeholder="Type to search..."/>
    <datalist id="datalistOptions">
        <option value="San Francisco">
        <option value="New York">
        <option value="Seattle">
        <option value="Los Angeles">
        <option value="Chicago">
    </datalist>

    <h2 id="form-select" class="mt-5" style="color:green !important">Select</h2>
    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.0/forms/select/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

    <h3 class="mt-3">Default</h3>

    <x-form-select class="mb-3" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </x-form-select>

    <h3 class="mt-3">Sizing</h3>

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

    <h3 class="mt-3">Multiple</h3>

    <x-form-select class="mb-3" multiple aria-label="multiple select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </x-form-select>

    <h3 class="mt-3">Size</h3>

    <x-form-select class="mb-3" size="3" aria-label="size 3 select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </x-form-select>

    <h3 class="mt-3">Disabled</h3>

    <x-form-select class="mb-5" aria-label="Disabled select example" disabled>
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </x-form-select>

    <h2 id="form-checks-and-radios" class="mt-5" style="color:green !important">Checks and radios</h2>
    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.0/forms/checks-radios/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

    <h3 class="mt-3">Checks</h3>

    <x-form-checkbox value="" label="Default checkbox" id="flexCheckDefault"/>
    <x-form-checkbox value="" label="Checked checkbox" id="flexCheckChecked" checked/>

    <h3 class="mt-3">Indeterminate</h3>

    <p>Skipped can only be done using javascript</p>

    <h3 class="mt-3">Disabled</h3>

    <x-form-checkbox value="" id="flexCheckDisabled" disabled label="Disabled checkbox"/>
    <x-form-checkbox value="" id="flexCheckCheckedDisabled" label="Disabled checked checkbox" checked disabled/>

    <h3 class="mt-3">Radios</h3>

    <x-form-radio name="flexRadioDefault" id="flexRadioDefault1" label="Default radio"/>
    <x-form-radio name="flexRadioDefault" id="flexRadioDefault1" label="Default checked radio" checked/>

    <h3 class="mt-3">Disabled</h3>

    <x-form-radio name="flexRadioDisabled" id="flexRadioDisabled" disabled label="Disabled radio"/>
    <x-form-radio name="flexRadioDisabled" id="flexRadioCheckedDisabled" checked disabled label="Disabled checked radio"/>

    <h3 class="mt-3">Switches</h3>

    <x-form-checkbox id="flexSwitchCheckDefault" label="Default switch checkbox input" switch/>
    <x-form-checkbox id="flexSwitchCheckDefault" label="Checked switch checkbox input" checked switch/>
    <x-form-checkbox id="flexSwitchCheckDefault" label="Disabled switch checkbox input" disabled switch/>
    <x-form-checkbox id="flexSwitchCheckDefault" label="Disabled checked switch checkbox input" disabled checked switch/>

    <h3 class="mt-3">vertically stacked</h3>

    <p>skipped</p>

    <h3 class="mt-3">Inline</h3>

    <div class="mb-3">
        <x-form-checkbox id="inlineCheckbox1" value="option1" label="1" inline/>
        <x-form-checkbox id="inlineCheckbox2" value="option1" label="2" inline/>
        <x-form-checkbox id="inlineCheckbox3" value="option1" label="3 (disabled)" disabled inline/>
    </div>
    <div class="mb-3">
        <x-form-radio name="inlineRadioOptions" id="inlineRadio1" value="option1" label="1" inline/>
        <x-form-radio name="inlineRadioOptions" id="inlineRadio1" value="option1" label="2" inline/>
        <x-form-radio name="inlineRadioOptions" id="inlineRadio1" value="option1" label="3 (disabled)" disabled inline/>
    </div>

    <h3 class="mt-3">Without labels</h3>

    <p>Skipped</p>

    <h3 class="mt-3">Checkbox toggle buttons</h3>

    <x-form-checkbox id="btn-check" autocomplete="off" label="Single toggle" toggle="a" class-button="btn-secondary" class-label="extra label classes"/>
    <x-form-checkbox id="btn-check-2" autocomplete="off" label="Checked" toggle="a" checked class-button="btn-tertiary"/>
    <x-form-checkbox id="btn-check-3" autocomplete="off" label="Disabled" toggle="a" disabled class-button="btn-quaternary"/>

    <h3 class="mt-3">Radio toggle buttons</h3>

    <x-form-radio name="options" id="option1" autocomplete="off" checked label="Checked" toggle="a" class-button="btn-secondary" class-label="extra label classes"/>
    <x-form-radio name="options" id="option2" autocomplete="off" label="Radio" toggle="a" class-button="btn-tertiary"/>
    <x-form-radio name="options" id="option3" autocomplete="off" checked label="Disabled" toggle="a" disabled class-button="btn-quaternary"/>
    <x-form-radio name="options" id="option4" autocomplete="off" label="Radio" toggle="a"/>

    <h3 class="mt-3">Outlined styles</h3>

    <x-form-checkbox id="btn-check-outlined" autocomplete="off" label="Single toggle" class-button="bnt-outline-primary" toggle="a"/>
    <x-form-checkbox id="btn-check-2-outlined" checked autocomplete="off" label="Checked" class-button="bnt-outline-secondary" toggle="a"/>
    <x-form-radio name="options-outlined" id="success-outlined" autocomplete="off" checked label="Checked succes radio" class-button="btn-outline-success" toggle="a"/>
    <x-form-radio  name="options-outlined" id="danger-outlined" autocomplete="off" label="Danger radio" class-button="btn-outline-danger" toggle="a"/>

    <h2 id="form-range" class="mt-5" style="color:green !important">Range</h2>
    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.0/forms/range/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

    <h3 class="mt-3">Standard</h3>
    <x-form-input type="range" class="mb-3" id="customRange1" label="Example range"/>

    <h3 class="mt-3">Disabled</h3>
    <x-form-input type="range" class="mb-3" id="disabledRange" label="Disabled range" disabled/>

    <h3 class="mt-3">Min and max</h3>
    <x-form-input type="range" class="mb-3" min="0" max="5" id="customRange2" label="Example range with min and max"/>

    <h3 class="mt-3">Steps</h3>
    <x-form-input type="range" class="mb-3" min="0" max="5" step="0.5" id="customRange2" label="Example range with min and max and step"/>

    <h2 id="form-input-group" class="mt-5" style="color:green !important">Input group</h2>
    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.0/forms/input-group/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

    <h3 class="mt-3">Basic example</h3>
    <p><span class="text-danger">TODO:</span> finish</p>

    <x-form-input-group class="mb-3">
        <x-slot:slot1>
            <span class="input-group-text" id="basic-addon1">@</span>
        </x-slot:slot1>
        <x-slot:slot2>
            <x-form-input type="text" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"/>
        </x-slot:slot2>
    </x-form-input-group>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
    </div>

    <label for="basic-url" class="form-label">Your vanity URL</label>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">.00</span>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username" aria-label="Username">
        <span class="input-group-text">@</span>
        <input type="text" class="form-control" placeholder="Server" aria-label="Server">
    </div>

    <div class="input-group">
        <span class="input-group-text">With textarea</span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>

    <h3 class="mt-3">Wrapping</h3>

    <x-form-input-group class="flex-nowrap">
        <x-form-input-group-text id="addon-wrapping">@</x-form-input-group-text>
        <x-form-input placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping"/>
    </x-form-input-group>

    <h3 class="mt-3">Sizing</h3>

    <x-form-input-group class="input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
        <x-form-input aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"/>
    </x-form-input-group>

    <x-form-input-group class="mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
        <x-form-input aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
    </x-form-input-group>

    <x-form-input-group class="input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">Large</span>
        <x-form-input aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"/>
    </x-form-input-group>

    <h3 class="mt-3">Checkboxes and radios</h3>
    <p><span class="text-danger">TODO: </span>Alignment not correct</p>
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

    <h3 class="mt-3">Multiple inputs</h3>
    <x-form-input-group class="input-group">
        <x-form-input-group-text>Name</x-form-input-group-text>
        <x-form-input aria-label="First name" placeholder="First name"/>
        <x-form-input aria-label="Last name" placeholder="Last name"/>
    </x-form-input-group>

    <h3 class="mt-3">Multiple addons</h3>

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

    <h3 class="mt-3">Button addons</h3>

    <x-form-input-group class="mb-3">
        <button class="btn btn-outline-secondary" type="button" id="button-addon1">Button</button>
        <x-form-input placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1"/>
    </x-form-input-group>

    <x-form-input-group class="mb-3">
        <x-form-input placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2"/>
        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
    </x-form-input-group>

    <x-form-input-group class="mb-3">
        <button class="btn btn-outline-secondary" type="button">Button</button>
        <button class="btn btn-outline-secondary" type="button">Button</button>
        <x-form-input placeholder="" aria-label="Example text with two button addons"/>
    </x-form-input-group>

    <x-form-input-group class="">
        <x-form-input placeholder="Recipient's username" aria-label="Recipient's username with two button addons"/>
        <button class="btn btn-outline-secondary" type="button">Button</button>
        <button class="btn btn-outline-secondary" type="button">Button</button>
    </x-form-input-group>

    <h3 class="mt-3">Buttons with dropdowns</h3>
    <x-form-input-group class="mb-3">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
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
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
        </ul>
    </x-form-input-group>

    <x-form-input-group class="">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action before</a></li>
            <li><a class="dropdown-item" href="#">Another action before</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
        </ul>
        <x-form-input aria-label="Text input with 2 dropdown buttons"/>
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
        </ul>
    </x-form-input-group>

    <h3 class="mt-3">Segmented buttons</h3>

    <x-form-input-group class="mb-3">
        <button type="button" class="btn btn-outline-secondary">Action</button>
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
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
        <button type="button" class="btn btn-outline-secondary">Action</button>
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
        </ul>
    </x-form-input-group>

    <h3 class="mt-3">Custom select</h3>

    <p><span class="text-danger">TODO: </span>Label elements in first 2 examples</p>

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
        <button class="btn btn-outline-secondary" type="button">Button</button>
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
        <button class="btn btn-outline-secondary" type="button">Button</button>
    </x-form-input-group>

    <h3 class="mt-3">Custom file input</h3>

    <p><span class="text-danger">TODO: </span>Label elements in first 2 examples</p>

    <x-form-input-group class="mb-3">
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        <x-form-input type="file" id="inputGroupFile01"/>
    </x-form-input-group>

    <x-form-input-group class="mb-3">
        <x-form-input type="file" id="inputGroupFile02"/>
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
    </x-form-input-group>

    <x-form-input-group class="mb-3">
        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Button</button>
        <x-form-input type="file" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload"/>
    </x-form-input-group>

    <x-form-input-group class="">
        <x-form-input type="file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload"/>
        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
    </x-form-input-group>

    <h2 id="form-floating-label" class="mt-5" style="color:green !important">Floating labels</h2>
    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.0/forms/floating-labels/" target="_blank">bootstrap documentation on form controls</a>. Adjusted to use our form-components.</p>

    <h3 class="mt-3">Example</h3>
    <x-form-input class="mb-3" id="floatingInput" placeholder="name@example.com" floating label="Email address"/>
    <x-form-input id="floatingPassword" placeholder="Password" floating label="Password"/>

    <h3 class="mt-3">Value already present</h3>
    <x-form-form class="form-floating">
        <x-form-input id="floatingInputValue" label="Input with value" placeholder="name@example.com" floating value="test@example.com"/>
    </x-form-form>

    <h3 class="mt-3">Form validation styles</h3>
    <x-form-form class="form-floating">
        <x-form-input class="is-invalid" id="floatingInputInvalid" placeholder="name@example.com" value="test@example.com" label="Invalid input" floating/>
    </x-form-form>

    <h3 class="mt-3">Textareas</h3>
    <div class="form-floating">
        <x-form-textarea placeholder="Leave a comment here" id="floatingTextarea" label="Comments" floating></x-form-textarea>
    </div>

    <h3 class="mt-3">Explicit height</h3>
    <div class="form-floating">
        <x-form-textarea placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" label="Comments" floating></x-form-textarea>
    </div>

    <h3 class="mt-3">Selects</h3>
    <div class="form-floating">
        <x-form-select id="floatingSelect" aria-label="Floating label select example" label="Works with selects" floating>
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </x-form-select>
    </div>

    <h3 class="mt-3">Layout</h3>
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

    <h2 id="form-layout" class="mt-5" style="color:green !important">Layout</h2>
    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.3/forms/layout/" target="_blank">bootstrap documentation</a>. Adjusted to use our form-components.</p>

    <h3 class="mt-3">Form grid</h3>
    <div class="row mb-3">
        <div class="col">
            <x-form-input type="text" placeholder="First name" aria-label="First name"/>
        </div>
        <div class="col">
            <x-form-input type="text" placeholder="Last name" aria-label="Last name"/>
        </div>
    </div>

    <h3 class="mt-3">Gutters</h3>
    <div class="row g-3 mb-3">
        <div class="col">
            <x-form-input type="text" placeholder="First name" aria-label="First name"/>
        </div>
        <div class="col">
            <x-form-input type="text" placeholder="Last name" aria-label="Last name"/>
        </div>
    </div>

    <h3 class="mt-3">Complex form</h3>
    <x-form-form class="row g-3 mb-3">
        <div class="col-md-6">
            <x-form-input type="email" label="Email" id="inputEmail4"/>
        </div>
        <div class="col-md-6">
            <x-form-input type="password" label="Password" id="inputPassword4"/>
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
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </x-form-form>

    <h3 class="mt-3">Horizontal form</h3>

    <x-form-form class="mb-3">
        <x-form-input type="email" class="mb-3" id="inputEmail3" label="Email test" horizontal class-label="col-2" class-control="col-10"/>
        <x-form-input type="password" class="mb-3" id="inputPassword3" label="Password" horizontal class-label="col-2" class-control="col-10"/>
        <x-form-input type="range" class="mb-3" id="inputPassword3" label="Password" min="1" step="1" max="10" horizontal class-label="col-2" class-control="col-10"/>
        <x-form-textarea class="mb-3" id="textarea-horizontal" label="textarea horizontal" horizontal value="test value using attribute" class-label="col-2" class-control="col-10"/>
        <x-form-select id="inputState" label="State" class="form-select mb-3" horizontal class-label="col-2" class-control="col-10">
            <option selected>Choose...</option>
            <option>Kansas</option>
            <option>Colorado</option>
        </x-form-select>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
            <div class="col-sm-10">
                <x-form-checkbox name="gridRadios" id="gridRadios1" label="first radio" value="option1" checked/>
                <x-form-checkbox name="gridRadios" id="gridRadios2" label="second radio" value="option2" checked/>
                <x-form-checkbox name="gridRadios" id="gridRadios3" label="Third disabled option" value="option3" disabled/>
            </div>
        </fieldset>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <x-form-checkbox  id="gridCheck1" label="Example checkbox"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </x-form-form>

    <h3 class="mt-5">Horizontal form label sizing</h3>

    <div class="row mb-3">
        <x-form-input type="email" class="form-control-sm" id="colFormLabelSm" label="Email" placeholder="col-form-label-sm" horizontal class-label="col-2" class-control="col-10"/>
    </div>
    <div class="row mb-3">
        <x-form-input type="email" id="colFormLabel" label="Email" placeholder="col-form-label" horizontal class-label="col-2" class-control="col-10"/>
    </div>
    <div class="row mb-3">
        <x-form-input type="email" class="form-control-lg" id="colFormLabelLg" label="Email" placeholder="col-form-label-lg" horizontal class-label="col-2" class-control="col-10"/>
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

    <h3 class="mt-3">Auto sizing</h3>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <h3 class="mt-3">Specific column classes</h3>

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
            <x-form-checkbox  label="Remember me" id="autoSizingCheck"/>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <h3 class="mt-3">Inline forms</h3>

    <x-form-form action="" tooltip="" label="test" class="row-cols-lg-auto g-3 align-items-center">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </x-form-form>

    <h2 id="form-validation" class="mt-5" style="color:green !important">Validation</h2>
    <p>Examples taken From <a href="https://getbootstrap.com/docs/5.0/forms/validation/" target="_blank">bootstrap documentation</a>. Adjusted to use our form-components.</p>

    <p>Not all controls support validation styles, see Bootstrap validation. Input, select and checkboxes do. As well as up to 1 form control in an input-group.</p>

    <x-form-form class="row g-3 needs-validation" novalidate>
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
                <x-form-input id="validationCustomUsername" aria-describedby="inputGroupPrepend" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
            </x-form-input-group>
        </div>
        <div class="col-md-12">
            <x-form-textarea id="textarea-horizontal" label="textarea horizontal" horizontal value="test value using attribute" class-label="col-2" class-control="col-10" valid-feedback="Yeah!" invalid-feedback="Nope" required/>
        </div>
        <div class="col-md-12">
            <x-form-input type="range" id="textarea-horizontal" label="textarea horizontal" horizontal value="test value using attribute" class-label="col-2" class-control="col-10" valid-feedback="Yo Yo!" invalid-feedback="Nah nah" min="0" max="10" step="1" required/>
        </div>
        <div class="col-md-6">
            <x-form-input id="validationCustom03" required label="City" valid-feedback="You're set!" invalid-feedback="Please provide a valid city."/>
        </div>
        <div class="col-md-3">
            <x-form-select id="validationCustom04" label="State" required valid-feedback="Way to go!" invalid-feedback="Please select a valid state.">
                <option selected disabled value="">Choose...</option>
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
            <x-form-radio name="validation-form" value="" id="invalidCheck" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
            <x-form-radio name="validation-form" value="" id="invalidCheck" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </x-form-form>

    <h3 class="mt-5">Browser defaults</h3>

    <x-form-form class="row g-3">
        <div class="col-md-4">
            <x-form-input id="validationDefault01" value="Mark" required label="First name"/>
        </div>
        <div class="col-md-4">
            <x-form-input id="validationDefault02" value="Otto" required label="Last name"/>
        </div>
        <div class="col-md-4">
            {{-- TODO label element --}}
            <label for="validationDefaultUsername" class="form-label">Username</label>
            <x-form-input-group>
                <x-form-input-group-text  id="inputGroupPrepend2">@</x-form-input-group-text>
                <x-form-input name="test" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required/>
            </x-form-input-group>
        </div>
        <div class="col-md-6">
            <label for="validationDefault03" class="form-label">City</label>
            <input type="text" class="form-control" id="validationDefault03" required>
        </div>
        <div class="col-md-3">
            <label for="validationDefault04" class="form-label">State</label>
            <select class="form-select" id="validationDefault04" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="validationDefault05" class="form-label">Zip</label>
            <input type="text" class="form-control" id="validationDefault05" required>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                    Agree to terms and conditions
                </label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </x-form-form>

    <h3 class="mt-5">Server side</h3>

    <x-form-form class="row g-3">
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
                <x-form-input-group-text id="inputGroupPrepend3">@</x-form-input-group-text>
                <x-form-input class="is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required/>
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    Please choose a username.
                </div>
            </x-form-input-group>
        </div>
        <div class="col-md-6">
            <x-form-input class="is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required label="City"/>
            <div id="validationServer03Feedback" class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div class="col-md-3">
            <x-form-select class="is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required label="State">
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </x-form-select>
            <div id="validationServer04Feedback" class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-3">
            <x-form-input class="is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required label="Zip"/>
            <div id="validationServer05Feedback" class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <x-form-checkbox class="is-invalid" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required label="Agree to terms and conditions"/>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </x-form-form>

    <h3 class="mt-5">Supported elements</h3>

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
            <button class="btn btn-primary" type="submit" disabled>Submit form</button>
        </div>
    </x-form-form>

    <h3 class="mt-3">Tooltips</h3>
    <x-form-form class="row g-3 needs-validation" novalidate>
        <div class="col-md-4 position-relative">
            <x-form-input id="validationTooltip01" value="Mark" label="First name" required valid-feedback="Looks good!" invalid-feedback="Aweful!" tooltip-feedback/>
        </div>
        <div class="col-md-4 position-relative">
            <x-form-input id="validationTooltip02" value="Otto" label="Last name" required valid-feedback="All set!" invalid-feedback="Not the way to go" tooltip-feedback/>
        </div>
        <div class="col-md-4 position-relative">
            <label for="validationTooltipUsername" class="form-label">Username</label>
            <x-form-input-group class="has-validation">
                <x-form-input-group-text id="validationTooltipUsernamePrepend">@</x-form-input-group-text>
                <x-form-input id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required valid-feedback="Wow!" invalid-feedback="Please choose a unique and valid username." tooltip-feedback/>
            </x-form-input-group>
        </div>
        <div class="col-md-6 position-relative">
            <x-form-input id="validationTooltip03" required valid-feedback="Nice city!" invalid-feedback="Please provide a valid city." tooltip-feedback label="City"/>
        </div>
        <div class="col-md-3 position-relative">
            <x-form-select class="form-select" id="validationTooltip04" required label="State" valid-feedback="Great state!" invalid-feedback="Please select a valid state." tooltip-feedback>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </x-form-select>
        </div>
        <div class="col-md-3 position-relative">
            <x-form-input type="text" class="form-control" id="validationTooltip05" required label="Zip" valid-feedback="Splendid" invalid-feedback="Please provide a valid zip." tooltip-feedback/>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </x-form-form>

    <h2 id="form-validation" class="mt-5" style="color:green !important">Custom tests</h2>
    <p>Custom tests not based on Bootstrap documentation</p>

    <h3>Setting "has-client-side-validation" and "has-custom-client-side-validation" attribute on form component with custom validation</h3>

    <x-form-form class="row g-3" has-client-side-validation has-custom-client-side-validation>
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
                <x-form-input id="validationCustomUsername" aria-describedby="inputGroupPrepend" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
            </x-form-input-group>
        </div>
        <div class="col-md-12">
            <x-form-textarea id="textarea-horizontal" label="textarea horizontal" horizontal value="test value using attribute" class-label="col-2" class-control="col-10" valid-feedback="Yeah!" invalid-feedback="Nope" required/>
        </div>
        <div class="col-md-12">
            <x-form-input type="range" id="textarea-horizontal" label="textarea horizontal" horizontal value="test value using attribute" class-label="col-2" class-control="col-10" valid-feedback="Yo Yo!" invalid-feedback="Nah nah" min="0" max="10" step="1" required/>
        </div>
        <div class="col-md-6">
            <x-form-input id="validationCustom03" required label="City" valid-feedback="You're set!" invalid-feedback="Please provide a valid city."/>
        </div>
        <div class="col-md-3">
            <x-form-select id="validationCustom04" label="State" required valid-feedback="Way to go!" invalid-feedback="Please select a valid state.">
                <option selected disabled value="">Choose...</option>
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
            <x-form-radio name="validation-form" value="" id="invalidCheck" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
            <x-form-radio name="validation-form" value="" id="invalidCheck" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </x-form-form>

    <h3>Setting "has-client-side-validation" attribute on form component with custom validation</h3>

    <x-form-form class="row g-3" has-client-side-validation>
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
                <x-form-input id="validationCustomUsername" aria-describedby="inputGroupPrepend" required valid-feedback="Yes!" invalid-feedback="Please choose a username."/>
            </x-form-input-group>
        </div>
        <div class="col-md-12">
            <x-form-textarea id="textarea-horizontal" label="textarea horizontal" horizontal value="test value using attribute" class-label="col-2" class-control="col-10" valid-feedback="Yeah!" invalid-feedback="Nope" required/>
        </div>
        <div class="col-md-12">
            <x-form-input type="range" id="textarea-horizontal" label="textarea horizontal" horizontal value="test value using attribute" class-label="col-2" class-control="col-10" valid-feedback="Yo Yo!" invalid-feedback="Nah nah" min="0" max="10" step="1" required/>
        </div>
        <div class="col-md-6">
            <x-form-input id="validationCustom03" required label="City" valid-feedback="You're set!" invalid-feedback="Please provide a valid city."/>
        </div>
        <div class="col-md-3">
            <x-form-select id="validationCustom04" label="State" required valid-feedback="Way to go!" invalid-feedback="Please select a valid state.">
                <option selected disabled value="">Choose...</option>
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
            <x-form-radio name="validation-form" value="" id="invalidCheck" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
            <x-form-radio name="validation-form" value="" id="invalidCheck" required label="Agree to terms and conditions" valid-feedback="You agree" invalid-feedback="You must agree before submitting."/>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </x-form-form>

    {{--    <h1>Complete form</h1>--}}

{{--    @php--}}
{{--        $options = [--}}
{{--            'be' => 'Belgium',--}}
{{--            'nl' => 'The Netherlands',--}}
{{--        ];--}}
{{--        $multiOptions = [--}}
{{--            'be' => 'Belgium',--}}
{{--            'nl' => 'The Netherlands',--}}
{{--         ];--}}

{{--    @endphp--}}

{{--    <x-form-form>--}}
{{--        @bind($user)--}}
{{--        <x-form-input name="last_name" label="Last Name" />--}}
{{--        <x-form-select class="mb-3" name="country_code" :options="$options" />--}}
{{--        <x-form-select class="mb-3" name="interests[]" :options="$multiOptions" label="Select your interests" multiple />--}}

{{--        <!-- \Spatie\Translatable\HasTranslations -->--}}
{{--        <x-form-textarea class="mb-3" name="biography" language="nl" placeholder="Dutch Biography" />--}}
{{--        <x-form-textarea class="mb-5" name="biography" language="en" placeholder="English Biography" />--}}

{{--        <!-- FormInline radio inputs -->--}}
{{--        <x-form-group name="newsletter_frequency" label="Newsletter frequency" inline>--}}
{{--            <x-form-radio name="newsletter_frequency" value="daily" label="Daily" />--}}
{{--            <x-form-radio name="newsletter_frequency" value="weekly" label="Weekly" />--}}
{{--        </x-form-group>--}}

{{--        <x-form-group>--}}
{{--            <x-form-checkbox name="subscribe_to_newsletter" label="Subscribe to newsletter" />--}}
{{--            <x-form-checkbox name="agree_terms" label="Agree with terms" />--}}
{{--        </x-form-group>--}}

{{--        <x-form-submit />--}}
{{--        @endbind--}}
{{--    </x-form-form>--}}

    {{--    <h1>Complete form (form-inline)</h1>--}}
{{--    <x-form-form-inline action="" tooltip="Hello">--}}
{{--        --}}{{--        @bind($user)--}}
{{--        <x-form-input name="last_name" label="Last Name" />--}}
{{--        <x-form-select name="country_code" :options="$options" />--}}
{{--        <x-form-select name="interests[]" :options="$multiOptions" label="Select your interests" multiple />--}}

{{--        <!-- \Spatie\Translatable\HasTranslations -->--}}
{{--        <x-form-textarea name="biography" language="nl" placeholder="Dutch Biography" />--}}
{{--        <x-form-textarea name="biography" language="en" placeholder="English Biography" />--}}

{{--        <!-- FormInline radio inputs -->--}}
{{--        <x-form-group name="newsletter_frequency" label="Newsletter frequency" inline>--}}
{{--            <x-form-radio name="newsletter_frequency" value="daily" label="Daily" />--}}
{{--            <x-form-radio name="newsletter_frequency" value="weekly" label="Weekly" />--}}
{{--        </x-form-group>--}}

{{--        <x-form-group>--}}
{{--            <x-form-checkbox name="subscribe_to_newsletter" label="Subscribe to newsletter" />--}}
{{--            <x-form-checkbox name="agree_terms" label="Agree with terms" />--}}
{{--        </x-form-group>--}}

{{--        <x-form-submit />--}}
{{--        --}}{{--        @endbind--}}
{{--    </x-form-form-inline>--}}

    {{--    <h1>Input variations</h1>--}}
    {{--    <h2>input 1</h2>--}}
    {{--    <x-form-input name="input-1" label="Input 1" required placeholder="input 1 placeholder" extra extra-2="yes">--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor input 1</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-input>--}}

    {{--    <h2>input 2 (floating label)</h2>--}}
    {{--    <x-form-input name="input-2" label="Input 2" required floating placeholder="input 2 placeholder">--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor input 2</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-input>--}}

    {{--    <h2>input 3 (floating label, zonder placeholder)</h2>--}}
    {{--    <x-form-input name="input-3" label="Input 3" required floating>--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor input 3</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-input>--}}

    {{--    <h2>input 4 (disabled)</h2>--}}
    {{--    <x-form-input name="input-4" label="Input 4" required floating disabled>--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor input 4</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-input>--}}

    {{--    <h2>input 5 (extra niet bestaande attributen)</h2>--}}
    {{--    <x-form-input name="input-5" label="Input 5" required floating extra="test" extra2="test 2">--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor input 5</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-input>--}}

    {{--    <h2>input 6 (hidden)</h2>--}}
    {{--    <x-form-input name="input-6" label="Input 6" required floating hidden>--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor input 6</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-input>--}}

    {{--    <h1>Textarea variations</h1>--}}

    {{--    <h2>Textarea 1</h2>--}}
    {{--    <x-form-textarea name="textarea-1" label="Textarea 1" required placeholder="Textarea 1 placeholder" extra extra-2="yes">--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor textarea 1</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-textarea>--}}

    {{--    <h2>Textarea 2 (floating label)</h2>--}}
    {{--    <x-form-textarea name="textarea-2" label="Input 2" required floating placeholder="input 2 placeholder">--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor textarea 2</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-textarea>--}}

    {{--    <h1>Html-editor variations</h1>--}}

    {{--    <h2>Html-editor 1</h2>--}}
    {{--    <x-form-html-editor name="html-editor-1" label="Html-editor 1" required placeholder="Html-editor 1 placeholder" extra extra-2="yes">--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor html-editor 1</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-html-editor>--}}

    {{--    <h2>Html-editor 2 (floating label)</h2>--}}
    {{--    <x-form-html-editor name="html-editor-2" label="Html-editor 2" required floating placeholder="Html-editor 2 placeholder">--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor html-editor 2</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-html-editor>--}}


    {{--    @php--}}
    {{--    $options = [--}}
    {{--        'nl' => 'Nederland',--}}
    {{--        'fr' => 'Frankrijk',--}}
    {{--        'de' => 'Duitsland',--}}
    {{--        ]--}}
    {{--    @endphp--}}
    {{--    <h1>Select variations</h1>--}}
    {{--    <h2>Select 1</h2>--}}
    {{--    <x-form-select name="select-1" label="Select 1" required placeholder="Select 1 placeholder" :options="$options" extra extra-2="yes">--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor select 1</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-select>--}}

    {{--    <h2>Select 2 (floating label)</h2>--}}
    {{--    <x-form-select name="select-2" label="Select 2" required floating placeholder="Select 2 placeholder" :options="$options" multiple>--}}
    {{--        <x-slot:help>--}}
    {{--            <p>Hulptekst voor select 2</p>--}}
    {{--        </x-slot>--}}
    {{--    </x-form-select>--}}

    {{--    <h1>Radio variations</h1>--}}

    {{--    <h2>Radio 1</h2>--}}
    {{--    <x-form-group name="notification_channel" label="How do you want to receive your notifications?">--}}
    {{--        <x-form-radio name="notification_channel" value="mail" label="Mail" default />--}}
    {{--        <x-form-radio name="notification_channel" value="slack" label="Slack" />--}}
    {{--    </x-form-group>--}}

    {{--    <h1>Checkbox variations</h1>--}}

    {{--    <h2>Checkbox 1</h2>--}}
    {{--    <x-form-group name="interests" label="Pick one or more interests">--}}
    {{--        <x-form-checkbox name="interests[]" :show-errors="false" value="laravel" label="Laravel" />--}}
    {{--        <x-form-checkbox name="interests[]" :show-errors="false" value="tailwindcss" label="Tailwind CSS" />--}}
    {{--    </x-form-group>--}}

    {{--    <h1>Range variations</h1>--}}
    {{--    <h2>Range 1</h2>--}}
    {{--    <x-form-form>--}}
    {{--        <x-form-input name="color" type="color" />--}}
    {{--        <x-form-checkbox name="check" switch />--}}
    {{--        <x-form-range name="range" />--}}
    {{--    </x-form-form>--}}

    {{--    <h1>Input group</h1>--}}
    {{--    <x-form-form>--}}
    {{--        <x-form-input-group>--}}
    {{--            <x-form-input name="name" id="name" />--}}
    {{--            <x-form-input-group-text>@</x-form-input-group-text>--}}
    {{--            <x-form-input name="username" id="username"></x-form-input>--}}
    {{--        </x-form-input-group>--}}
    {{--    </x-form-form>--}}

</x-layout>


@once
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('form[novalidate]')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
      })()
    </script>
@endonce
