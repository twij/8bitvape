//Display information about a flavour
getJSON('https://8bitvape.com/api/flavour/' + input)
    .then(obj => {
        if (obj) {
            if (obj.error) {
                print('not found')
                return
            }
            print(`{g}${obj.name}{/} by {b}${obj.company}{/}`)
            print(`{o}${obj.description}{/}`)
        }
        else {
            print('not found');
        }
    })
    .catch(print.error);