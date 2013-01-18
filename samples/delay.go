package main

import (
    "fmt"
    "time"
)

func main() {
    sum := 0
    for i := 0; i < 10; i++ {
        sum += i
        fmt.Println(sum);
        time.Sleep(time.Second);
    }
}

