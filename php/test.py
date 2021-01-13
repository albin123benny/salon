i,j=9,0
while(i<20):
    print(i,":",j)
    if(j+25 < 60):
        j+=25
    else:
        i+=1
        temp=60-j
        j=0
        j+=25-temp