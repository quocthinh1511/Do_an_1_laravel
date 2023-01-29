<template>
    <div>
      <b-button class="blue-background" v-b-toggle.sidebar-no-header><i class="uil uil-align-left "></i> Menu</b-button>
      <b-sidebar id="sidebar-no-header" aria-labelledby="sidebar-no-header-title" no-header shadow>
        <template #default="{ hide }">
          <div class="p-3">

            <span class= 'text-style' >BK Learning <i class="uil uil-book"></i></span>
          
            <nav class="mb-3">
              <b-nav vertical>
                <b-nav-item active @click="hide">Danh sách môn học</b-nav-item>
                <b-nav-item href="#link-1" @click="hide">Deadline</b-nav-item>
                <b-nav-item href="#link-2" @click="hide">Diễn Đàn</b-nav-item>
              </b-nav>
            </nav>
            <b-button variant="primary" block @click="hide">Close Sidebar</b-button>
            
          </div>
        </template>
      </b-sidebar>
    </div>
  </template>