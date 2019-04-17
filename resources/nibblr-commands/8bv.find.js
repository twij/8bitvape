//Search mixes and display closest result
getJSON('https://8bitvape.com/api/mix/find/' + input)
    .then(obj => {
        if (obj) {
            if (obj.error) {
                print('not found')
                return
            }
            print(`{g}${obj.name}{/} by {b}${obj.user}{/}`)
            obj.flavours.forEach(function(flv){
                print(`{p}${flv.company}{/} {y}${flv.name}{/}: {r}${flv.percentage}%{/}`)
            })
        }
        else {
            print('not found');
        }
    })
    .catch(print.error);