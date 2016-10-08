package aghr.olhaobra;

import android.content.ActivityNotFoundException;
import android.content.Intent;
import android.os.Bundle;
import android.speech.RecognizerIntent;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

import aghr.olhaobra.Classes.Obra;

public class MainActivity extends AppCompatActivity {
//
    private final int REQ_CODE_SPEECH_INPUT = 100;
    List<Obra> obras;

    //ListView lvObras = (ListView) findViewById(R.id.lvObras);

    View clickedListItem;
    int clickedPosition;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_olha_obra_main);

//        lvObras.setOnItemClickListener(new AdapterView.OnItemClickListener()
//        {
//            @Override
//            public void onItemClick(AdapterView<?> parent, View  view, int position, long id)
//            {
//                clickedPosition = position;
//
//            }
//        });

        obras = Obra.getMockList();

        //AtualizaListaObras();
    }

//    private void promptSpeechInput() {
//        Intent intent = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
//        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL,
//                RecognizerIntent.LANGUAGE_MODEL_FREE_FORM);
//        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE, "pt-BR");
//        intent.putExtra(RecognizerIntent.EXTRA_PROMPT,
//                getString(R.string.mensagem_gravar_audio));
//        try {
//            startActivityForResult(intent, REQ_CODE_SPEECH_INPUT);
//        } catch (ActivityNotFoundException a) {
//            Toast.makeText(getApplicationContext(),
//                    getString(R.string.mensagem_gravar_audio_nao_suportado),
//                    Toast.LENGTH_SHORT).show();
//        }
//    }

    /**
     * Receiving speech input
     * */
//    @Override
//    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
//        super.onActivityResult(requestCode, resultCode, data);
//
//        switch (requestCode) {
//            case REQ_CODE_SPEECH_INPUT: {
//                if (resultCode == RESULT_OK && null != data) {
//
//                    //ArrayList<String> result = data;
//
//                }
//                break;
//            }
//
//        }
//    }
//
//    public void AtualizaListaObras() {
//        ArrayAdapter adapter = new ArrayAdapter(this,android.R.layout.simple_list_item_1,obras);
//
//        lvObras.setAdapter(adapter);
//    }
}
