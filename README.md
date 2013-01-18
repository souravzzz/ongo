ongo
====
- - -

Compile and run your Go code without downloading the go framework.

So, you are interested in [Go](http://golang.org/) and want to try out some simple stuff but the download is too large? Ongo to the rescue!

This tool will send your code to http://tour.golang.org (TGO), let them compile and run it and play back (or just display) the response on your machine.

It is very easy to use, just run `php go.php <samples/hello_world.go>`

TGO provides two versions of the api: the 1st version just compiles and gives the output, the 2nd version can play back (simulating delays) the output which is useful if you have sleep/concurrency in the code. By default, v1 is used. If you are using "time", you should probably use v2 like `php go.php -v2 -f <filename.go>`. Arguably, it is better than TGO, because they don't support programs with time/sleep yet (they are still on the v1 API)!

#### Options accepted:
* `-f` : Give the source file
* `-d` : Enable Debug Mode
* `-u` : Pass custom URL
* `-v` : Select API version (1/2)
* `-h` : Print usage
 
#### Known Issues:
* Keep in mind that it does not support many basic features like giving input, passing command line parameters, file access etc. due to API limitations.

**USE IT RESPONSIBLY**, If you want to run a lot of code, please [download Go](http://golang.org/doc/install) and enable all the features!

