<div class="w-96 shadow-2xl p-3 my-2 mx-auto">
    {{-- text edit header --}}
    <div class="p-2">
        <button type="button" class="btn p-1" data-element="bold">
            <i class="fa fa-bold"></i>
        </button>
        <button type="button" class="btn p-1" data-element="italic">
            <i class="fa fa-italic"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="underline">
            <i class="fa fa-underline"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="insertUnorderedList">
            <i class="fa fa-list-ul"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="insertOrderedList">
            <i class="fa fa-list-ol"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="createLink">
            <i class="fa fa-link"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="justifyLeft">
            <i class="fa fa-align-left"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="justifyRight">
            <i class="fa fa-align-right"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="justifyCenter">
            <i class="fa fa-align-center"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="justifyFull">
            <i class="fa fa-align-justify"></i>
        </button>
        <button type="button" class="btn  p-1" data-element="insertImage">
            <i class="fa fa-image"></i>
        </button>
    </div>
    {{-- end text edit header --}}

    {{-- content --}}
    <div class="h-56 border-solid p-2 overflow-hidden" contenteditable="true"></div>
    {{-- end of content --}}
</div>

<script>
//Elements
const elements = document.querySelectorAll('.btn');

//Event
elements.forEach(element => {
    element.addEventListener('click', () => {
        let command = element.dataset['element'];

        if(command === 'createLink' || command === 'insertImage'){
            let url = prompt('Insérer le lien :', 'http://')
            document.execCommand(command, false, url);
        } else {
            document.execCommand(command, false, null);
        }
        
    });
});
</script>