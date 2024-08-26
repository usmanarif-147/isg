// copy to clipboard profile URL

function copyToClipboard() {
    const urlText = document.getElementById('urlText').innerText;
    const textarea = document.createElement('textarea');
    textarea.value = urlText;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    const copyMessage = document.getElementById('copyMessage');
    copyMessage.style.display = 'block';
    setTimeout(() => {
        copyMessage.style.display = 'none';
    }, 2000);
}
