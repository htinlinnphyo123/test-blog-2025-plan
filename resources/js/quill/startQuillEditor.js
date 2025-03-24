// resources/js/initializeQuillEditor.js
import Quill from 'quill';
import 'quill/dist/quill.snow.css';
import addAudioButton from './addAudioButton';
import selectLocalImage from './selectLocalImage';

//defaultText is for PHP->old() and for edit Page, automatically add to editor if the value exits 
export default function startQuillEditor(selector,path,defaultText="") {
    const toolbarOptions = [
        ['bold', 'italic', 'underline'],        // toggled buttons
        ['link', 'image'],
      
        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],  
        
        [{ 'align': [] }],
      
        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme      
        
    ];   
    const quill = new Quill(selector, {
        theme: 'snow',
        placeholder:'Text Here.',
        modules: {
            toolbar: toolbarOptions,
        }
    });

    if(defaultText){
        quill.root.innerHTML = defaultText;
    }
    // addAudioButton(quill)

    const toolbar = quill.getModule('toolbar');
    toolbar.addHandler('image', () => selectLocalImage(quill,path));

    return quill;
}

