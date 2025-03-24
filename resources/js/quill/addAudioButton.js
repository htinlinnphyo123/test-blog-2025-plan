export default function addAudioButton(quill, path) {
    // Get the toolbar container
    const toolbar = quill.getModule('toolbar').container;

    // Create a custom button for audio
    const buttonGroup = document.createElement('span');
    buttonGroup.classList.add('ql-formats'); // To follow Quill's toolbar format

    const audioButton = document.createElement('button');
    audioButton.innerHTML = '<i class="fa fa-music"></i>'; // Add an icon for audio
    audioButton.setAttribute('type', 'button');
    audioButton.onclick = () => console.log('audio is working')

    buttonGroup.appendChild(audioButton);

    // Append the button group with the audio button to the toolbar
    toolbar.appendChild(buttonGroup);
}