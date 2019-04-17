//Display information about a user
getJSON('https://8bitvape.com/api/user/' + input)
    .then(obj => {
        if (obj) {
            if (obj.error) {
                print('not found')
                return
            }
            print(`{g}${obj.name}{/} {y}(${obj.xp} xp){/}`)
            obj.mixes.forEach(function(mix){
                print(`{p}${mix.name}{/}: {r}${mix.slug}`)
            })
        } else {
            print('not found');
        }
    })
    .catch(print.error);