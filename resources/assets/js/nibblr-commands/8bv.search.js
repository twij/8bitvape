//Search mixes
getJSON('https://8bitvape.com/api/mix/search/' + encodeURI(input))
    .then(obj => {
        if (obj) {
            if (obj.error) {
                print('not found')
                return
            }
            obj.forEach(function(mix){
                print(`{g}${mix.name}{/} by {b}${mix.user}{/}: ~8bv.mix ${mix.slug}`)
            })
        } else {
            print('not found');
        }
    })
    .catch(print.error);