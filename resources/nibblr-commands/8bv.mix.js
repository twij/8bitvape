//Get a mix by its slug
getJSON('https://8bitvape.com/api/mix/' + input)
    .then(obj => {
        if (obj) {
            if (obj.error) {
                print('not found')
                return
            }
            print(`{g}${obj.name}{/} by {b}${obj.user}{/}`)
            print(`{o}${obj.description}{/}`)
            obj.flavours.forEach(function(flv){
                print(`{p}${flv.company}{/} {y}${flv.name}{/}: {r}${flv.percentage}%{/}`)
            })
        }
        else {
            print('not found');
        }
    })
    .catch(print.error);