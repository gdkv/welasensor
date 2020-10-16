import IMask from 'imask';

let macInput = document.querySelector('input[name="mac"]');
if (typeof(macInput) != 'undefined' && macInput != null){
    let macMask = IMask(
        document.querySelector('input[name="mac"]'), {
            mask: '**-**-**-**-**-**',
            definition: {
                // <any single char>: <same type as mask (RegExp, Function, etc.)>
                // defaults are '0', 'a', '*'
                '#': /[0-9A-F]/
            }
        }
    );
}
