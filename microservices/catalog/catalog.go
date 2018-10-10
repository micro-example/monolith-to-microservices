package main

import (
	"github.com/go-chassis/go-chassis"
	"github.com/go-chassis/go-chassis/core/lager"
	"net/http"
	rf "github.com/go-chassis/go-chassis/server/restful"
)

func init() {
	chassis.RegisterSchema("rest", &RestFulMessage{})
}

func main() {
	if err := chassis.Init(); err != nil {
		lager.Logger.Errorf("Init failed: %s", err)
		return
	}
	chassis.Run()
}

type RestFulMessage struct {
}


func (r *RestFulMessage) GetCatalog(b *rf.Context) {
	response := "Pizza,Ola,Movies:200,150,200"
	b.Write([]byte(response))
}

func (s *RestFulMessage) URLPatterns() []rf.Route {
	return []rf.Route{
		{
			http.MethodGet, "/getCatalog", "GetCatalog"},
	     }
}