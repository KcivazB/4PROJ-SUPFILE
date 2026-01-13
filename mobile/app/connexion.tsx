import { View, Text, StyleSheet, TextInput, TouchableOpacity } from 'react-native';
import { useRouter } from 'expo-router';
import { Colors } from '@/constants/Colors';

export default function Connexion() {
  const router = useRouter();

  return (
    <View style={styles.container}>
      <View style={styles.content}>
        <Text style={styles.title}>Connexion</Text>
        
        <TextInput
          style={styles.input}
          placeholder="Email"
          placeholderTextColor={Colors.light.color_5}
        />
        
        <TextInput
          style={styles.input}
          placeholder="Mot de passe"
          placeholderTextColor={Colors.light.color_5}
          secureTextEntry
        />
        
        <TouchableOpacity 
          style={styles.button}
          onPress={() => router.push('/pages/my-space')}
        >
          <Text style={styles.buttonText}>Se connecter</Text>
        </TouchableOpacity>
        
        <TouchableOpacity onPress={() => router.push('/inscription')}>
          <Text style={styles.link}>Pas encore de compte ? S'inscrire</Text>
        </TouchableOpacity>
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: Colors.light.color_1,
  },
  content: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  title: {
    fontSize: 32,
    fontWeight: 'bold',
    color: Colors.light.color_9,
    marginBottom: 40,
  },
  input: {
    width: '100%',
    height: 50,
    backgroundColor: Colors.light.color_3,
    borderRadius: 10,
    paddingHorizontal: 15,
    marginBottom: 15,
    fontSize: 16,
    borderWidth: 1,
    borderColor: Colors.light.color_4,
  },
  button: {
    width: '100%',
    height: 50,
    backgroundColor: Colors.light.color_8,
    borderRadius: 10,
    justifyContent: 'center',
    alignItems: 'center',
    marginTop: 10,
  },
  buttonText: {
    color: Colors.light.color_1,
    fontSize: 18,
    fontWeight: '600',
  },
  link: {
    color: Colors.light.color_8,
    fontSize: 14,
    marginTop: 20,
    textDecorationLine: 'underline',
  },
});
