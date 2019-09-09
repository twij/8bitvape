
const displayImage = (image) => {
    document.getElementById('main-image').style.backgroundImage=`url('${image}')`
}

const thumbs = document.getElementsByClassName('thumb')

Array.from(thumbs).forEach(function(element) {
    element.addEventListener('click', function() {
        displayImage(element.getElementsByClassName('thumb-img')[0].getAttribute('src'))
    })
})

