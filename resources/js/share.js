export default {
    popup: function (url, sharer) {
        let popupHeight = 550,
            popupWidth = 780,
            posY = Math.floor((window.outerHeight - popupHeight) / 2),
            posX = Math.floor((window.outerWidth - popupWidth) / 2);

        let popup = window.open(
            sharer + encodeURIComponent(url),
            'social',
            `width=${popupWidth},height=${popupHeight},left=${posX},top=${posY},location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1`
        );

        if (popup) {
            popup.focus();
        }
    },
}
