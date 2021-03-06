<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>作业三 - 杨子越 课程设计 U201816816</title>
  </head>
  <body>
    <div id="myCanvasBox" style="height: 600px; width: 100%;"></div>
  </body>
  <footer>
  <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <script src="./k.js"></script>
    <script>
      const type = 5;
      const options = {
        sharpness: 2,
        blockWidth: 11,
        horizontalCells: 10,
      };
      const kLine = new RenderKLine("myCanvasBox", options);

      const renderHistoryData = async (reloadData) => {
        kLine.loading();
        const res = await fetch("./sh600000.txt");
        const data_raw = await res.text();
        const data = data_raw
          .split("\n")
          .filter((item) => item.length > 0)
          .map((item) => {
            const splited = item.split(",");

            const processedTime = [...splited[1]]
              .map((item, idx) => {
                if ([3, 5, 7].includes(idx)) {
                  return [item, "/"];
                } else {
                  return item;
                }
              })
              .flat(Infinity).join('');

            return {
              time: new Date(processedTime).getTime() / 1000,
              open_price: splited[2],
              high: splited[3],
              low: splited[4],
              close: splited[5],
              vol: splited[6],
            };
          });

        console.log(data);

        kLine.updateHistoryQuote({
          data,
          type,
          callback: renderHistoryData,
          reloadData,
        });
      };

      renderHistoryData();
    </script>
  </footer>
</html>
