taken_hr=[9,9,10,10,14]
taken_min=[0,25,30,55,30]
taken_avg_time=[25,15,15,25,25]

# able_hr  =[9,9,9,10,10,11,11,11,12,12]
# able_min=[0,25,50,15,40,5,30,55,20,45]

able_hr  =[9,9,9,10,10,11,11,11,12,12,13,13,14,14,14,15,15,16,16,16,17,17,18,18,19,19,19]
able_min= [0,25,50,15,40,5,30,55,20,45,10,35,0,25,50,15,40,5,30,55,20,45,10,35,0,25,50]
average_time=25

shedule_hr=[]
shedule_min=[]

def tim(hr,min,addtime):
    i=hr
    j=min
    if(j+addtime < 60):
        j+=addtime
    else:
        i+=1
        temp=60-j
        j=0
        j+=addtime-temp
    return i,j

def equal(avg_time,j):
    tup=tim(able_hr[j],able_min[j],avg_time)
    able_hr[j]=tup[0]
    able_min[j]=tup[1]
    if j+1 < len(able_hr):
        for h in range (j+1,len(able_hr)):
            tupp=tim(able_hr[h-1],able_min[h-1],average_time)
            able_hr[h]=tupp[0]
            able_min[h]=tupp[1]


# sorting taken time because if not in order the schedule time will vary and be take the last one even if its not the greatest
for x in range(0,len(taken_hr)):
    for y in range(x,len(taken_hr)):
        if taken_hr[x] > taken_hr[y]:
            temp_hr=taken_hr[x]
            temp_min=taken_min[x]
            temp_avg=taken_avg_time[x]

            taken_hr[x]=taken_hr[y]
            taken_min[x]=taken_min[y]
            taken_avg_time[x]=taken_avg_time[y]

            taken_hr[y]=temp_hr
            taken_min[y]=temp_min
            taken_avg_time[y]=temp_avg

        elif taken_hr[x]==taken_hr[y] and taken_min[x] > taken_min[y]:
            temp_min=taken_min[x]
            temp_avg=taken_avg_time[x]
            taken_min[x]=taken_min[y]
            taken_avg_time[x]=taken_avg_time[y]
            taken_min[y]=temp_min
            taken_avg_time[y]=temp_avg
            

# print(taken_hr)
# print(taken_min)

for i in range(0,len(taken_hr)):
    for j in range(0,len(able_hr)):
        if (taken_hr[i] == able_hr[j] and taken_min[i] == able_min[j]):
            print(taken_hr[i],":",taken_min[i])
            equal(taken_avg_time[i],j)
        elif(taken_hr[i] == able_hr[j] and able_min[j]+average_time > taken_min[i]):
            print(taken_hr[i],":",taken_min[i])
            equal(average_time,j)

# print(able_hr)
# print(able_min)


for a in range(0,len(able_hr)):
    print(able_hr[a],":",able_min[a])