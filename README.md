ongo
====
- - -

Compile and run your Go code without downloading the go framework.

So, you are interested in [Go](http://golang.org/) and want to try out some simple stuff but the download is too large? Ongo to the rescue!

This tool will send your code to http://tour.golang.org (TGO), let them compile and run it and play back (or just display) on your machine.

It is very easy to use, just run `php go.php <sample.go>`

TGO provides two versions of the api: the 1st version just compiles and gives the output, the 2nd version can play back (simulating delays) the output which is useful if you have sleep/concurrency in the code.

*USE IT RESPONSIBLY*, If you want to run a lot of code, please [download Go](http://golang.org/doc/install).

