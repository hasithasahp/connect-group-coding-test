// Run this with Nodejs on CLI (> node challenge2)

N = 5
a = [ 2, 3, 1, 2, 3 ]

resultArray = [];
for (let i = 0; i < N; i++) {
    const element = a[i];

    if(!resultArray.includes(element)) {
        if(a.filter(x => x == element).length > 1) {
            resultArray.push(element);
            process.stdout.write(element + " ");
        }
    }
}
