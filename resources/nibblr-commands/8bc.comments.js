getJSON('http://8bitvape.com/api/comments/' + input)
    .then(obj => {
        if (obj) {
            if (obj.error) {
                print('not found')
                return
            }
            print(`{g}${obj.name}{/} by {y}(${obj.user}{/}`)
            obj.comments.forEach(function(comment){
                print(`{p}${comment.user}{/} (${comment.rating}/5): {r}${comment.comment}`)
            })
        }
        else {
            print('not found');
        }
    })
    .catch(print.error);